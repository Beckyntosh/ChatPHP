CREATE TABLE IF NOT EXISTS language_content (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
module_name VARCHAR(50) NOT NULL,
vocabulary TEXT NOT NULL,
creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO language_content (module_name, vocabulary) VALUES ('Spanish for beginners', '{"hello": "hola", "wine": "vino"}'),
('French for beginners', '{"love": "amour", "city": "ville"}'),
('German for beginners', '{"thank you": "danke", "beer": "bier"}'),
('Italian for beginners', '{"good morning": "buongiorno", "pizza": "pizza"}'),
('Japanese for beginners', '{"goodbye": "sayonara", "sushi": "sushi"}'),
('Russian for beginners', '{"please": "пожалуйста", "tea": "чай"}'),
('Mandarin for beginners', '{"yes": "是的", "rice": "米饭"}'),
('Arabic for beginners', '{"thank you": "شكرا", "camel": "جمل"}'),
('Korean for beginners', '{"hello": "안녕하세요", "kimchi": "김치"}'),
('Portuguese for beginners', '{"how are you": "como está", "beach": "praia"}');
