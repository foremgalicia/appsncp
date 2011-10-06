#Aplicación SNCP Proxecto Desire3 - Forem Galicia
*Actualiza los registros de la base de de datos del Sistema Nacional*
*de Cualificaciones Profesionales desde un sencillo entorno web.*
##Requerimientos mínimos
* wwwserver : Nginx 1.x // Apache2 
* PHP 5.3
* MySQL 5.0
* Permisos de propietario en el directorio web que servirá la app
* Git 1.5

##Instalación
* Clonar repo github `git clone git://github.com/foremgalicia/appsncp`
* Crear base de datos para la aplicacion.SQL code: `CREATE DATABASE appsncp`
* Crear usuario con privilegios.SQL code: `GRANT ALL PRIVILEGES ON appsncp.* to appsncp@'localhost' IDENTIFIED BY 'appsncp' WITH GRANT OPTION;`
