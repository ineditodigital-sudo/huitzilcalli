# Huitzilcalli

![Static Badge](https://img.shields.io/badge/php-8.1.0-blue?logo=php&logoColor=%23fff)
![Static Badge](https://img.shields.io/badge/laravel-^10.8-green?logoColor=%23fff)
![Static Badge](https://img.shields.io/badge/MySQL-8.0.39-violet?logo=mysql&logoColor=%23fff)

## Ejecución
Para ejecutar el proyecto hay dos formas distintas, la primera es instalando la consola de ejecución de Laravel e iniciando el proyecto, de la siguiente manera:
```console
> composer global require laravel/installer
> php artisan serve
```
La segunda manera es a través de **XAMPP**, para ello solo es necesario clonar este repositorio en una carpeta que pueda ejecutar el código PHP correspondiente, además de configurar los enlaces con el dominio local http://localhost y pasando los archivos de la carpeta "**public**" a la raíz del proyecto (Estos archivos solo funcionan en esta carpeta si se ejecuta el proyecto con la primera opción, desde XAMPP no).

La diferencia entre estas dos formas es que en la primera se posee todo el ambiente de ejecución de Laravel (hot-reload y compilación de SaSS), mientras que de la segunda manera se ejecutará como simple código de PHP (que de igual forma puede ser util para evitar problemas al desplegar en producción)

## Proyecto
#### Objetivo
Desarrollar una plataforma web para la búsqueda y reservación de cabañas y amenidades de Huitzilcalli. Se busca tener una página simple y fácil de usar, ya que los principales usuarios serán personas de mayor edad. El sitio debe permitir ver las amenidades de cada cabaña, galería, ubicación y, además, tener la capacidad de solicitar una reservación vía WhatsApp mediante un calendario.

Así mismo, esta plataforma web debe contar con un apartado de administrador, en donde el usuario correspondiente pueda gestionar las diferentes cabañas, amenidades, configuraciones generales y gestión de reservaciones.

#### Funcionalidades
<table>
    <thead>
        <tr>
            <th><strong>CLIENTE</strong></th>
            <th><strong>ADMINISTRADOR</strong></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>
                <ul>
                    <li>Visualización de servicios (cabañas o amenidades)</li>
                    <li>Galería de fotos</li>
                    <li>Funcionalidad para compartir servicio</li>
                    <li>Detalles de servicio</li>
                    <li>Visualización de disponibilidad de reservación</li>
                    <li>Solicitud de reservación vía WhatsApp</li>
                </ul>
            </td>
            <td>
                <ul>
                    <li>Gestión de servicios</li>
                    <li>Configuración general</li>
                    <li>Gestión de reservaciones</li>
                    <li>Mapa interactivo con reservaciones</li>
                </ul>
            </td>
        </tr>
    </tbody>
</table>

Hecho con :heart: por ©Maindsoft