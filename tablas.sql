
-- Tabla de libros
CREATE TABLE libros (
    id INT PRIMARY KEY,
    titulo VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    fecha_registro DATETIME YEAR TO MINUTE 
);


