CREATE TABLE language_selection (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    language_code VARCHAR(30) NOT NULL,
    language_text VARCHAR(30) NOT NULL,
    UNIQUE KEY unique_language (language_code)
);

INSERT INTO language_selection (language_code, language_text) VALUES 
('en', 'English'),
('es', 'Español'),
('fr', 'Français'),
('de', 'Deutsch'),
('it', 'Italiano'),
('pt', 'Português'),
('nl', 'Nederlands'),
('ru', 'Pусский'),
('jp', '日本語'),
('kr', '한국어');
