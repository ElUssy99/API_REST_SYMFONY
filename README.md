# API_REST_SYMFONY
Crear y listar objetos de DB.
Para hacer las comprobaciones de como funciona el proyecto, se necesita Postman, por ejemplo.

---

## Iniciar servicio
Para iniciar servicio, desde CMD/Terminal:
```
symfony server:start
```
## Insertar nueva mascota
Desde Postman, seleccionamos la opcion de POST e introducimos:
```
https://127.0.0.1:8000/api/pet
```
Y en el área de texto JSON:
```
{
  "name": "NombreMascota",
  "type": "TipoAnimal",
  "photoUrls": [
    "https://..."
  ]
}
```
IMPORTANTE: Donde la URL de la foto, se pone una URL de Irternet.

Finalmente enviamos la peticion con SEND y en Preview, si todo ha salido bien, mostrara un mensaje conforme hemos creado la mascota correctamente.
## Listar mascotas
Para listar todas las mascotas, seleccionamos la opcion GET, con la misma URL que anteriormente hemos puesto, y enviamos la peticion con SEND.
```
https://127.0.0.1:8000/api/pet
```
El resultado, se debería de mostrar en Preview, con un JSON de todas las mascotas que hay en la Base de Datos.
### Conexion con DDBB
En caso que no conecte con la Base de Datos, es necesario cambiar la línea 28 del archivo ".env" por la URL de la conexion a la suya.
