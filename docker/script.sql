USE almacen;
CREATE TABLE Producto (
  idProducto INT NOT NULL AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  cantidad INT NOT NULL,
  precio DECIMAL(10,2) NOT NULL,
  PRIMARY KEY (idProducto)
);
SELECT*FROM Producto 