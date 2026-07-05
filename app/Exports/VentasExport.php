<?php

namespace App\Exports;

use App\Models\Venta;
use OpenSpout\Common\Entity\Cell;
use OpenSpout\Common\Entity\Row;
use OpenSpout\Common\Entity\Style\Style;
use OpenSpout\Writer\XLSX\Writer;

class VentasExport
{
    public function download()
    {
        $ventas = Venta::with(['cliente', 'detalle_ventas.producto'])->latest()->get();

        $path = tempnam(sys_get_temp_dir(), 'ventas_') . '.xlsx';

        $writer = new Writer();
        $writer->openToFile($path);

        $headerStyle = new Style(fontBold: true, fontSize: 12);

        $writer->addRow(new Row([
            Cell::fromValue('Venta ID', $headerStyle),
            Cell::fromValue('Fecha', $headerStyle),
            Cell::fromValue('Cliente', $headerStyle),
            Cell::fromValue('Producto', $headerStyle),
            Cell::fromValue('Cantidad', $headerStyle),
            Cell::fromValue('Precio Unitario', $headerStyle),
            Cell::fromValue('Subtotal', $headerStyle),
            Cell::fromValue('Total Venta', $headerStyle),
        ]));

        foreach ($ventas as $venta) {
            $clienteNombre = $venta->cliente
                ? $venta->cliente->nombre . ' ' . $venta->cliente->apellido
                : 'Consumidor Final';

            if ($venta->detalle_ventas->isEmpty()) {
                $writer->addRow(Row::fromValues([
                    $venta->id,
                    $venta->created_at->format('d/m/Y H:i'),
                    $clienteNombre,
                    '—',
                    '',
                    '',
                    '',
                    $venta->total,
                ]));
                continue;
            }

            foreach ($venta->detalle_ventas as $detalle) {
                $writer->addRow(Row::fromValues([
                    $venta->id,
                    $venta->created_at->format('d/m/Y H:i'),
                    $clienteNombre,
                    $detalle->producto?->nombre ?? 'Producto eliminado',
                    $detalle->cantidad,
                    $detalle->precio_unitario,
                    $detalle->subtotal,
                    $venta->total,
                ]));
            }
        }

        $writer->close();

        return response()->download($path, 'ventas-detalles.xlsx')->deleteFileAfterSend(true);
    }
}
