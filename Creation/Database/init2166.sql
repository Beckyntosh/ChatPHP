CREATE TABLE IF NOT EXISTS languages (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  code VARCHAR(3) NOT NULL,
  language VARCHAR(30) NOT NULL,
  UNIQUE KEY unique_lang (code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Inserting values into the languages table
INSERT INTO languages (code, language) VALUES 
('en', 'English'),
('es', 'Spanish'),
('fr', 'French'),
('de', 'German'),
('it', 'Italian'),
('pt', 'Portuguese'),
('ja', 'Japanese'),
('ko', 'Korean'),
('zh', 'Chinese'),
('ru', 'Russian');
