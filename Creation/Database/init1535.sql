CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    vocabulary TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO language_modules (title, vocabulary) VALUES ('Spanish Basics', 'hola=hello,gracias=thank you,por favor=please');
INSERT INTO language_modules (title, vocabulary) VALUES ('French Phrases', 'bonjour=good morning,au revoir=goodbye,merci=thank you');
INSERT INTO language_modules (title, vocabulary) VALUES ('German Vocabulary', 'hallo=hello,tschüss=goodbye,danke=thank you');
INSERT INTO language_modules (title, vocabulary) VALUES ('Italian Words', 'ciao=hello,grazie=thank you,per favore=please');
INSERT INTO language_modules (title, vocabulary) VALUES ('Chinese Characters', '你好=hello,谢谢=thank you,请=please');
INSERT INTO language_modules (title, vocabulary) VALUES ('Japanese Phrases', 'こんにちは=hello,ありがとう=thank you,お願いします=please');
INSERT INTO language_modules (title, vocabulary) VALUES ('Russian Vocabulary', 'привет=hello,спасибо=thank you,пожалуйста=please');
INSERT INTO language_modules (title, vocabulary) VALUES ('Portuguese Basics', 'olá=hello,obrigado=thank you,por favor=please');
INSERT INTO language_modules (title, vocabulary) VALUES ('Arabic Words', 'مرحبا=hello,شكرا=thank you,من فضلك=please');
INSERT INTO language_modules (title, vocabulary) VALUES ('Korean Phrases', '안녕하세요=hello,감사합니다=thank you,부탁합니다=please');
