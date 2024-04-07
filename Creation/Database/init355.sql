CREATE TABLE languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language_code VARCHAR(2) NOT NULL
);

INSERT INTO languages (language_code) VALUES ('en'), ('es');

CREATE TABLE language_strings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language_id INT,
    key_name VARCHAR(50),
    value TEXT,
    FOREIGN KEY (language_id) REFERENCES languages(id)
);

INSERT INTO language_strings (language_id, key_name, value) VALUES 
(1, 'PAGE_TITLE', 'Welcome to the Multilingual Page'),
(1, 'SELECT_LANGUAGE', 'Select Language'),
(1, 'SAVE', 'Save'),
(1, 'WELCOME_MESSAGE', 'Welcome to the Multilingual Page'),
(1, 'WELCOME_DESCRIPTION', 'This is a sample page demonstrating multilingual support'),
(2, 'PAGE_TITLE', 'Bienvenido a la Página Multilingüe'),
(2, 'SELECT_LANGUAGE', 'Seleccionar Idioma'),
(2, 'SAVE', 'Guardar'),
(2, 'WELCOME_MESSAGE', 'Bienvenido a la Página Multilingüe'),
(2, 'WELCOME_DESCRIPTION', 'Esta es una página de ejemplo que muestra soporte multilingüe');
