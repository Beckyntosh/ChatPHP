CREATE TABLE IF NOT EXISTS language_content (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(50) NOT NULL,
title VARCHAR(100) NOT NULL,
vocabulary TEXT NOT NULL,
reg_date TIMESTAMP
);


INSERT INTO language_content (language, title, vocabulary) VALUES ('Spanish', 'Greetings', '{"hello": "hola", "goodbye": "adios", "thank you": "gracias"}');
INSERT INTO language_content (language, title, vocabulary) VALUES ('French', 'Numbers', '{"one": "un", "two": "deux", "three": "trois"}');
INSERT INTO language_content (language, title, vocabulary) VALUES ('German', 'Food', '{"apple": "apfel", "bread": "brot", "water": "wasser"}');
INSERT INTO language_content (language, title, vocabulary) VALUES ('Italian', 'Colors', '{"red": "rosso", "blue": "blu", "yellow": "giallo"}');
INSERT INTO language_content (language, title, vocabulary) VALUES ('Japanese', 'Animals', '{"cat": "neko", "dog": "inu", "rabbit": "usagi"}');
INSERT INTO language_content (language, title, vocabulary) VALUES ('Chinese', 'Family', '{"father": "父亲", "mother": "母亲", "sister": "姐妹"}');
INSERT INTO language_content (language, title, vocabulary) VALUES ('Russian', 'Weather', '{"sun": "солнце", "rain": "дождь", "snow": "снег"}');
INSERT INTO language_content (language, title, vocabulary) VALUES ('Arabic', 'Clothing', '{"shirt": "قميص", "pants": "سروال", "shoes": "حذاء"}');
INSERT INTO language_content (language, title, vocabulary) VALUES ('Korean', 'Emotions', '{"happy": "행복한", "sad": "슬픈", "angry": "화난"}');
INSERT INTO language_content (language, title, vocabulary) VALUES ('Portuguese', 'Occupations', '{"doctor": "médico", "teacher": "professor", "engineer": "engenheiro"}');
