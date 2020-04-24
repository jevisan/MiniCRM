# MiniCRM

## About

A simplified but functional version of a CRM system. Integrates CRUD (create, read, update, delete) operations over Companies and their Employees entities.

This project was developed completely in the [Laravel](https://laravel.com) web framework. It implements the  the **AdminLTE-Laravel** integration by: [Jeroen Noten](https://github.com/jeroennoten), which can be found in: [https://github.com/jeroennoten/Laravel-AdminLTE](https://github.com/jeroennoten/Laravel-AdminLTE).

## Features

* Visually attractive [AdminLTE V3](https://adminlte.io) admin template
* Admin log functionality
* CRUD functionality over **Companies** and **Employees** entities
* Database migrations for creating **Companies** and **Employees** entities
* Capability to upload and store companies image logos
* Notifications via mail whenever a new company is registered in the system

## Usage

Just clone or download the project, then set the required environment variables by creating a copy of the `.env.example` file and renaming it as `.env`.

Database connection variables and smtp configuration variables are required for the system to work.

Then run migrations and initial user seed:

`$ php artisan db:migrate --seed`

The system can be accessed with the admin account:

* **User mail:** admin@admin.com
* **Password:** password
