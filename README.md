# CyberProtocol Fiambrería

**CyberProtocol Fiambrería** es un sistema de gestión integral moderno y open-source diseñado para fiambrerías, almacenes y comercios minoristas. Proporciona un conjunto completo de herramientas para administrar el día a día del negocio: desde un **punto de venta (POS)** rápido e intuitivo hasta control de inventario, gestión de clientes, y reportes exportables. Desarrollado con Laravel, Livewire y Tailwind CSS, ofrece una experiencia fluida tanto en escritorio como en dispositivos móviles.

## Características

- **Punto de Venta (POS)** - Interfaz rápida para registrar ventas con búsqueda de productos
- **Gestión de Productos** - Control de stock, precios, fechas de elaboración y vencimiento
- **Categorías** - Organización de productos por categorías (Fiambres, Quesos, Embutidos, Bebidas)
- **Clientes** - Registro y gestión de clientes con historial de ventas
- **Exportación a Excel** - Exportación de productos a archivos XLSX usando OpenSpout
- **Panel de Clima** - Widget meteorológico con datos de Open-Meteo para la ciudad de Formosa
- **Cotización del Dólar** - Widget con tipo de cambio actual (DolarAPI)
- **Búsqueda por Código de Barras** - Consulta de productos usando OpenFoodFacts
- **API REST** - Endpoints para consulta de productos via API con Laravel Sanctum
- **Autenticación** - Registro, inicio de sesión, verificación de email y restablecimiento de contraseña

## Requisitos

- PHP ^8.4
- Composer
- Node.js y npm
- SQLite (por defecto) o MySQL

## Instalación

```bash
# Clonar el repositorio
git clone <url-del-repositorio>
cd cyberprotocol-fiambreria

# Instalar dependencias de PHP
composer install

# Configurar archivo de entorno
cp .env.example .env
php artisan key:generate

# Ejecutar migraciones y seeders
php artisan migrate --seed

# Instalar dependencias de Node.js
npm install

# Compilar assets
npm run build

# Iniciar el servidor de desarrollo
php artisan serve
```

## Desarrollo

```bash
# Iniciar entorno de desarrollo (servidor, queue, logs y Vite)
composer dev
```

## Ejecutar Tests

```bash
composer test
```

## Tecnologías

- **Framework**: Laravel 13.x
- **PHP**: 8.3+
- **Frontend**: Livewire 4.x, Alpine.js 3.x, Tailwind CSS
- **Base de Datos**: SQLite / MySQL
- **Autenticación API**: Laravel Sanctum
- **Exportación**: OpenSpout 5.x
- **Tests**: Pest 4.x
- **Build**: Vite 8.x

## Licencia

Este proyecto es open-source bajo la licencia MIT.