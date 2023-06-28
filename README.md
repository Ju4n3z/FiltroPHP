# Reto PHP

Este es un repositorio creado en el cual se utiliza SQL, PHP, HTML, CSS y JS para hacer la conbinación frontend-backend

### ¿Cómo funciona?

La página donde se puede realizar todo se llama index.html en este se encuentre el CRUD completo de la tabla llamada campers, donde usted puede enviar datos, actualizazr datos, eliminar un registro y listar todos los registraos de la tabla.

Para poder utilizar puede descargar el repositorio y llevarloen donde tiene instalado Apache, y cambiar las rutas correspondientes en el código.

### ¿Cómo se creo la base de datos utilizando la terminal?

La base de datos se creó utilizando los comandos que se mostrarán a continuación en las imagenes:

![](/var/www/html/ApolT01-018/FiltroPHP/img/1.png)

![](/var/www/html/ApolT01-018/FiltroPHP/img/2.png)

Acá una imagen en myphpadmin donde se pueden ver las relaciones:

![](/var/www/html/ApolT01-018/FiltroPHP/img/3.png)

Y en este caso se agregaron unos registros en las otras tablas para poder utilizar el CRUD de la tabla campers

en el mismo repositorio está el archivo .sql donde está todo el código, este se encuentra en la carpeta /scripts/db/db.sql

También se cambiaron dos entradas de la base de datos porque eran erroneas de acuerdo a su entrada las cuales fueron: nombrePais a varchar y idCamper a int

