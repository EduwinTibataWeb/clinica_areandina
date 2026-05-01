# 🏥 Sistema de Gestión Clínica

Aplicación web desarrollada en **Laravel 12** para la gestión de
pacientes, médicos y citas médicas.

## 🚀 Instalación

``` bash
git clone https://github.com/TU-USUARIO/clinica-app.git
cd clinica-app
composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
npm run dev
php artisan serve
```

## 🔐 Usuarios de prueba

Admin: - Email: admin@clinica.com - Password: admin123

Paciente: - Email: nancy@clinica.com - Password: nancy123

Paciente: - Email: oscar@clinica.com - Password: oscar123

## 🛠️ Comandos útiles

``` bash
php artisan optimize:clear
php artisan migrate:fresh --seed
php artisan db:seed
```
