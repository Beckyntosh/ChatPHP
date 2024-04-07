CREATE TABLE IF NOT EXISTS language_modules (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
language VARCHAR(30) NOT NULL,
content TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO language_modules (title, language, content) VALUES ('Spanish for Beginners Module 1', 'Spanish', 'Hola - Hello\nAdiós - Goodbye\nPor favor - Please\nGracias - Thank you');
INSERT INTO language_modules (title, language, content) VALUES ('Spanish for Beginners Module 2', 'Spanish', 'Buenos días - Good morning\nBuenas noches - Good evening\nSí - Yes\nNo - No');
INSERT INTO language_modules (title, language, content) VALUES ('Spanish for Beginners Module 3', 'Spanish', 'Me llamo - My name is\n¿Cómo estás? - How are you?\nBien - Fine\nMal - Bad');
INSERT INTO language_modules (title, language, content) VALUES ('Spanish for Beginners Module 4', 'Spanish', 'Tengo hambre - I am hungry\nTengo sed - I am thirsty\n¿Cuánto cuesta? - How much does it cost?\n¿Dónde está? - Where is it?');
INSERT INTO language_modules (title, language, content) VALUES ('Spanish for Beginners Module 5', 'Spanish', 'El baño - The bathroom\nLa cuenta - The bill\n¿Hablas inglés? - Do you speak English?\nLo siento - I am sorry');
INSERT INTO language_modules (title, language, content) VALUES ('Spanish for Beginners Module 6', 'Spanish', 'Quiero - I want\nNecesito - I need\nVoy - I go\nVengo - I come');
INSERT INTO language_modules (title, language, content) VALUES ('Spanish for Beginners Module 7', 'Spanish', 'Una cerveza por favor - One beer please\nLa comida - The food\nEl agua - The water\nEl menú - The menu');
INSERT INTO language_modules (title, language, content) VALUES ('Spanish for Beginners Module 8', 'Spanish', 'Rojo - Red\nAzul - Blue\nVerde - Green\nAmarillo - Yellow');
INSERT INTO language_modules (title, language, content) VALUES ('Spanish for Beginners Module 9', 'Spanish', 'Escuela - School\nProfesor - Teacher\nLibro - Book\nTarea - Homework');
INSERT INTO language_modules (title, language, content) VALUES ('Spanish for Beginners Module 10', 'Spanish', 'Familia - Family\nPadre/madre - Father/mother\nHermano/hermana - Brother/sister\nHijo/hija - Son/daughter');
