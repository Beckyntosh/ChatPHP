CREATE TABLE IF NOT EXISTS language_modules (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(30) NOT NULL,
level VARCHAR(30) NOT NULL,
vocabulary TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO language_modules (language, level, vocabulary) VALUES ('Spanish', 'Beginner', 'Hola,Adios,Gracias');
INSERT INTO language_modules (language, level, vocabulary) VALUES ('French', 'Intermediate', 'Bonjour,Merci,Comment ca va');
INSERT INTO language_modules (language, level, vocabulary) VALUES ('German', 'Advanced', 'Guten Tag,Danke,Schmetterling');
INSERT INTO language_modules (language, level, vocabulary) VALUES ('Italian', 'Beginner', 'Ciao,Grazie,Pasta');
INSERT INTO language_modules (language, level, vocabulary) VALUES ('Chinese', 'Intermediate', 'Ni Hao,Xie Xie,Shen Me');
INSERT INTO language_modules (language, level, vocabulary) VALUES ('Japanese', 'Advanced', 'Konnichiwa,Arigato,Sushi');
INSERT INTO language_modules (language, level, vocabulary) VALUES ('Russian', 'Beginner', 'Privet,Spasibo,Voda');
INSERT INTO language_modules (language, level, vocabulary) VALUES ('Portuguese', 'Intermediate', 'Ola,Obrigado,Praia');
INSERT INTO language_modules (language, level, vocabulary) VALUES ('Korean', 'Advanced', 'Annyeonghaseyo,Kamsahamnida,Bibimbap');
INSERT INTO language_modules (language, level, vocabulary) VALUES ('Arabic', 'Intermediate', 'Marhaba,Shukran,Habibi');