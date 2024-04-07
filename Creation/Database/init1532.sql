CREATE TABLE IF NOT EXISTS vocabulary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(30) NOT NULL,
word VARCHAR(50),
translation VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert data into vocabulary table
INSERT INTO vocabulary (language, word, translation) VALUES ('Spanish', 'Hola', 'Hello');
INSERT INTO vocabulary (language, word, translation) VALUES ('Spanish', 'Adios', 'Goodbye');
INSERT INTO vocabulary (language, word, translation) VALUES ('Spanish', 'Gato', 'Cat');
INSERT INTO vocabulary (language, word, translation) VALUES ('Spanish', 'Perro', 'Dog');
INSERT INTO vocabulary (language, word, translation) VALUES ('Spanish', 'Casa', 'House');
INSERT INTO vocabulary (language, word, translation) VALUES ('Spanish', 'Rojo', 'Red');
INSERT INTO vocabulary (language, word, translation) VALUES ('Spanish', 'Verde', 'Green');
INSERT INTO vocabulary (language, word, translation) VALUES ('Spanish', 'Comida', 'Food');
INSERT INTO vocabulary (language, word, translation) VALUES ('Spanish', 'Agua', 'Water');
INSERT INTO vocabulary (language, word, translation) VALUES ('Spanish', 'Feliz', 'Happy');
