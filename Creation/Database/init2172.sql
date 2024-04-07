CREATE TABLE IF NOT EXISTS languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language_code VARCHAR(5) NOT NULL,
language_name VARCHAR(50) NOT NULL,
UNIQUE (language_code)
);

INSERT INTO languages (language_code, language_name) VALUES
('en', 'English'),
('es', 'Spanish'),
('fr', 'French'),
('de', 'German'),
('it', 'Italian'),
('ja', 'Japanese'),
('ko', 'Korean'),
('pt', 'Portuguese'),
('ru', 'Russian'),
('zh', 'Chinese')
ON DUPLICATE KEY UPDATE language_code=language_code;
