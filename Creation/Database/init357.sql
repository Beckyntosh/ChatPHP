CREATE TABLE languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language_code VARCHAR(2) NOT NULL
);

CREATE TABLE translations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language_id INT,
    title VARCHAR(255) NOT NULL,
    welcome_message VARCHAR(255) NOT NULL,
    FOREIGN KEY (language_id) REFERENCES languages(id)
);

INSERT INTO languages (language_code) VALUES ('en'), ('es');

INSERT INTO translations (language_id, title, welcome_message) VALUES 
(1, 'Welcome to Our Handbags Store', 'Find your perfect handbag!'),
(2, 'Bienvenido a Nuestra Tienda de Bolsos', '¡Encuentra el bolso perfecto!'),
(1, 'Title for English', 'English welcome message'),
(2, 'Title for Spanish', 'Spanish welcome message'),
(1, 'English Title 3', 'English message 3'),
(2, 'Spanish Title 3', 'Spanish message 3'),
(1, 'English Title 4', 'English message 4'),
(2, 'Spanish Title 4', 'Spanish message 4'),
(1, 'English Title 5', 'English message 5'),
(2, 'Spanish Title 5', 'Spanish message 5');
