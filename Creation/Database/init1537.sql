CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    vocabulary LONGTEXT,
    reg_date TIMESTAMP
);

INSERT INTO language_modules (title, vocabulary) VALUES ('Spanish for Beginners', 'hola, adios, gracias');
INSERT INTO language_modules (title, vocabulary) VALUES ('French for Beginners', 'bonjour, au revoir, merci');
INSERT INTO language_modules (title, vocabulary) VALUES ('German for Beginners', 'hallo, tschüss, danke');
INSERT INTO language_modules (title, vocabulary) VALUES ('Italian for Beginners', 'ciao, arrivederci, grazie');
INSERT INTO language_modules (title, vocabulary) VALUES ('Japanese for Beginners', 'konnichiwa, sayonara, arigatou');
INSERT INTO language_modules (title, vocabulary) VALUES ('Mandarin for Beginners', 'nǐ hǎo, zài jiàn, xiè xiè');
INSERT INTO language_modules (title, vocabulary) VALUES ('Russian for Beginners', 'privet, do svidaniya, spasibo');
INSERT INTO language_modules (title, vocabulary) VALUES ('Korean for Beginners', 'annyeong, annyeonghi gaseyo, kamsahamnida');
INSERT INTO language_modules (title, vocabulary) VALUES ('Arabic for Beginners', 'marhaban, wadaeaan, shukran');
INSERT INTO language_modules (title, vocabulary) VALUES ('Portuguese for Beginners', 'olá, adeus, obrigado');