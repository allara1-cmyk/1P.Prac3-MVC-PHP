# Sistema de Inventario – MVC en PHP

Este proyecto es una aplicación simple de inventario desarrollada en **PHP con el patrón MVC**, utilizando **Bootstrap** para la interfaz gráfica y **MySQL** como motor de base de datos.

---

## 1. Descargar el proyecto

1. Descargue el archivo `.zip` del proyecto.
2. Descomprímalo en su computadora.

---

## 2. Colocar el proyecto en XAMPP

1. Copie la carpeta descomprimida.
2. Péguela dentro de:

C:\xampp\htdocs\

3. El proyecto debe verse así:

C:\xampp\htdocs\mvc_php\


---

## 3. Configurar y ejecutar MySQL con Docker Compose

Este proyecto incluye un archivo:

docker-compose.yml


Para levantar el contenedor MySQL:

1. Abra una terminal en la carpeta del proyecto.
2. Ejecute:

```bash
docker compose up -d
```

3. Espere a que el contenedor inicie correctamente.

---

## 4. Probar la conexión en MySQL Workbench

1. Abra MySQL Workbench.

2. Conéctese al servidor usando estos datos:

* Host: 127.0.0.1

* Puerto: 3306 (o el que definiste en el docker-compose)

* Usuario: root

* Contraseña: la que definiste en el .env o docker-compose

3. Si la conexión funciona, continúe con la creación de la base de datos.

---

## 5. Crear la base de datos y tabla requerida

Ejecute en Workbench el scrip.db

---

## 6. Ejecutar la aplicación

Abra su navegador y acceda a la siguiente ruta:

http://localhost/mvc_php/index.php/inicio


