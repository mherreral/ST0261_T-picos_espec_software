# La murga - tienda en línea de licores

## Table of contents
* [Requisitos](#req)
* [Correr el proyecto](#run)
* [Generar datos](#gendata)

### Requisitos <a name="req"></a>
* Versión de PHP >= 8.1.4
* Composer
* MySQL
* Apache (se sugiere el uso de xammp)

### Correr el proyecto <a name="run"></a>
* Primero se debe generar un archivo .env, se puede usar el archivo de este mismo repositorio llamado env.example. Acá se deberá cambiar el nombre de la base de datos y las credenciales de acceso de la misma.

```
cp env.example .env
```

* Correr las migraciones

```
php artisan migrate
```

* Ejecutar el proyecto

```
php artisan serve
```

* Ir al navegador con la ruta que arroja php

```
firefox http://127.0.0.1:8000
```



### Generar datos <a name="gendata"></a>
