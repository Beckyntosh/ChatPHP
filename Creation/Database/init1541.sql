CREATE TABLE IF NOT EXISTS vocabulary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
spanish VARCHAR(30) NOT NULL,
english VARCHAR(30) NOT NULL
);

INSERT INTO vocabulary (spanish, english) VALUES ('hola', 'hello');
INSERT INTO vocabulary (spanish, english) VALUES ('gato', 'cat');
INSERT INTO vocabulary (spanish, english) VALUES ('casa', 'house');
INSERT INTO vocabulary (spanish, english) VALUES ('rojo', 'red');
INSERT INTO vocabulary (spanish, english) VALUES ('azul', 'blue');
INSERT INTO vocabulary (spanish, english) VALUES ('manzana', 'apple');
INSERT INTO vocabulary (spanish, english) VALUES ('perro', 'dog');
INSERT INTO vocabulary (spanish, english) VALUES ('amarillo', 'yellow');
INSERT INTO vocabulary (spanish, english) VALUES ('verde', 'green');
INSERT INTO vocabulary (spanish, english) VALUES ('carro', 'car');