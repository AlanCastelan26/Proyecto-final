-- Crear la base de datos
CREATE DATABASE empresa_aoec;

-- Utilizar la base de datos
USE empresa_aoec;

-- Crear la tabla Registro_productos
CREATE TABLE Registro_productos (
  Id INT PRIMARY KEY AUTO_INCREMENT,
  Nombre VARCHAR(255),
  Marca VARCHAR(255),
  Presentación VARCHAR(255),
  Precio DECIMAL(10, 2)
);

-- Crear la tabla Productos_inventario
CREATE TABLE Productos_inventario (
  Id INT PRIMARY KEY AUTO_INCREMENT,
  Cantidad INT
);

-- Crear la tabla Actualizacion_Inventario
CREATE TABLE Actualizacion_Inventario (
  Id INT PRIMARY KEY AUTO_INCREMENT,
  Fecha_de_compra DATE,
  Numero_de_factura VARCHAR(255),
  Id_producto INT,
  Cantidad INT,
  FOREIGN KEY (Id_producto) REFERENCES Registro_productos(Id)
);

-- Crear la tabla Ventas_Productos
CREATE TABLE Ventas_Productos (
  Id_venta INT PRIMARY KEY AUTO_INCREMENT,
  Id_producto INT,
  Fecha_venta DATE,
  Cantidad_producto INT,
  Precio DECIMAL(10, 2),
  Nombre_Producto VARCHAR(255),
  FOREIGN KEY (Id_producto) REFERENCES Registro_productos(Id)
);