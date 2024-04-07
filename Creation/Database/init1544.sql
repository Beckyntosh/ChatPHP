CREATE TABLE IF NOT EXISTS language_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    category VARCHAR(255) NOT NULL,
    spanish_word VARCHAR(255) NOT NULL,
    english_translation VARCHAR(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('Spanish for beginners', 'Hola', 'Hello');
INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('Spanish for beginners', 'Gato', 'Cat');
INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('Spanish for beginners', 'Casa', 'House');
INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('Spanish for beginners', 'Perro', 'Dog');
INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('Spanish for beginners', 'Rojo', 'Red');
INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('Spanish for beginners', 'Verde', 'Green');
INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('Spanish for beginners', 'Libro', 'Book');
INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('Spanish for beginners', 'Árbol', 'Tree');
INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('Spanish for beginners', 'Manzana', 'Apple');
INSERT INTO language_content (category, spanish_word, english_translation) VALUES ('Spanish for beginners', 'Pantalón', 'Pants');
