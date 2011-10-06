#Aplicación SNCP Proxecto Desire3 - Forem Galicia
*Actualiza os rexistros da base de datos do Sistema Nacional*
*de Cualificacións Profesionais dende unha sinxela interface web.*
##Acerca de
*Esta aplicación foi programada durante a realización do Proxecto Desire www.proxectodesire.eu .*
*Esta aplicación está financiada pola Xunta de Galicia e o Fondo Social Europeo.*
##Requerimentos mínimos
* wwwserver : Nginx 1.x // Apache2 
* PHP 5.3
* MySQL 5.0
* Permisos de propietario no directorio web que servirá a app
* Git 1.5

##Instalación
* Clonar repositorio github `git clone git://github.com/foremgalicia/appsncp`
* Crear a base de datos para a aplicacion.SQL code: `CREATE DATABASE appsncp`
* Crear usuario con privilexios.SQL code: `GRANT ALL PRIVILEGES ON appsncp.* to appsncp@'localhost' IDENTIFIED BY 'appsncp' WITH GRANT OPTION;`
* Crear estructura e insertar os registros da BBDD dende o arquivo **sncp.sql**.SQL code `mysql -u appsncp -p appsncp < sncp.sql`
* Otorgar permisos de escritura ao usuario que executa el servicio www sobre o cartafol da app. Unix/Linux code: `chown -R www-data appsncp/`
* A aplicación estará accesible, por exemplo,dende http://localhost/appsncp/app

##Licenza
*Este programa é software libre. Pode redistribuilo e/ou modificalo baixo os termos da Licenza Pública Xeral de GNU segundo foi publicada pola Free Software Foundation, ben na versión 3 desta licenza ou ben(segundo a súa elección) de calquera versión posterior.Este programa distribúese coa esperanza de que sexa útil, pero SEN GARANTÍA ALGUNHA, incluíndo a garantía MERCANTIL implícita ou sen garantir a CONVENIENCIA PARA UN PROPÓSITO PARTICULAR. Pode consultar a Licenza Pública Xeral de GNU para máis información.
*Debería(ver arquivo COPYING) ter unha copia da Licenza Pública Xeral xunto con este programa. Se non foi así, escriba á Free Software Foundation, Inc., en 675 Mass Ave, Cambridge, MA 02139, EEUU.*

