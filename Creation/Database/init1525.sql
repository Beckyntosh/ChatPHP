CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_name VARCHAR(255) NOT NULL,
    vocabulary TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO language_modules (module_name, vocabulary) VALUES ('Spanish for Beginners', '{"words": ["hola", "adios", "gracias"]}');
INSERT INTO language_modules (module_name, vocabulary) VALUES ('French for Beginners', '{"words": ["bonjour", "au revoir", "merci"]}');
INSERT INTO language_modules (module_name, vocabulary) VALUES ('German for Beginners', '{"words": ["hallo", "tschuss", "danke"]}');
INSERT INTO language_modules (module_name, vocabulary) VALUES ('Italian for Beginners', '{"words": ["ciao", "arrivederci", "grazie"]}');
INSERT INTO language_modules (module_name, vocabulary) VALUES ('Japanese for Beginners', '{"words": ["こんにちは", "さようなら", "ありがとう"]}');
INSERT INTO language_modules (module_name, vocabulary) VALUES ('Chinese for Beginners', '{"words": ["你好", "再见", "谢谢"]}');
INSERT INTO language_modules (module_name, vocabulary) VALUES ('Russian for Beginners', '{"words": ["привет", "до свидания", "спасибо"]}');
INSERT INTO language_modules (module_name, vocabulary) VALUES ('Portuguese for Beginners', '{"words": ["olá", "adeus", "obrigado"]}');
INSERT INTO language_modules (module_name, vocabulary) VALUES ('Korean for Beginners', '{"words": ["안녕하세요", "안녕히 가세요", "고맙습니다"]}');
INSERT INTO language_modules (module_name, vocabulary) VALUES ('Arabic for Beginners', '{"words": ["مرحبا", "وداعا", "شكرا"]}');
