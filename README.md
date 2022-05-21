<p align="center">prueba microvoz por heyscar romero</p>


## Instalacion

1. tener instalado git, composer, node, servidor mysql  y conexion a internet
2. ejecutar git clone  git@github.com:heyscardev/prueba_microvoz.git
3. instalar paquetes y dependencias de node y composercon estos comandos
    composer install
    npm install
4. nos vamos a nuestro servidor sql y creamo una base de datos (vacia)
5. volvemos al proyecto y clonamos el archivo .env.example
5. renombramos el clon de .env.example a .env
6. dentro de .env dar las credenciales de mysql y el nombre de la base de datos
7. limpiar cache
        php artisan config:clear
        php artisan cache:clear
9. ejecutar migraciones (con el servidor mysql corriendo)
    php artisan migrate
8. ejecutamos seeders para los datos de prueba
    php artisan db:seed
9. ejecutamos php artisan serve y abrir la direccion en el navegador
    
