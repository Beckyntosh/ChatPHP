CREATE TABLE IF NOT EXISTS LanguageModules (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
module_name VARCHAR(50) NOT NULL,
language VARCHAR(50),
content TEXT,
reg_date TIMESTAMP
);

INSERT INTO LanguageModules (module_name, language, content) VALUES ('Spanish for Beginners', 'Spanish', 'Hola (Hello), Adios (Goodbye), Por favor (Please)');
INSERT INTO LanguageModules (module_name, language, content) VALUES ('French Phrases', 'French', 'Bonjour (Hello), Merci (Thank you), Excusez-moi (Excuse me)');
INSERT INTO LanguageModules (module_name, language, content) VALUES ('German Vocabulary', 'German', 'Guten Morgen (Good morning), Danke (Thank you), Bitte (Please)');
INSERT INTO LanguageModules (module_name, language, content) VALUES ('Italian Expressions', 'Italian', 'Ciao (Hello/Bye), Grazie (Thank you), Prego (Youre welcome)');
INSERT INTO LanguageModules (module_name, language, content) VALUES ('Japanese Words', 'Japanese', 'Konnichiwa (Hello), Sayonara (Goodbye), Arigatou (Thank you)');
INSERT INTO LanguageModules (module_name, language, content) VALUES ('Chinese Characters', 'Chinese', '你好 (Hello), 谢谢 (Thank you), 对不起 (Sorry)');
INSERT INTO LanguageModules (module_name, language, content) VALUES ('Russian Alphabet', 'Russian', 'А (A), Б (B), В (V)');
INSERT INTO LanguageModules (module_name, language, content) VALUES ('Portuguese Basics', 'Portuguese', 'Ola (Hello), Adeus (Goodbye), Por favor (Please)');
INSERT INTO LanguageModules (module_name, language, content) VALUES ('Korean Phrases', 'Korean', 'Annyeonghaseyo (Hello), Kamsahamnida (Thank you), Mianhamnida (Sorry)');
INSERT INTO LanguageModules (module_name, language, content) VALUES ('Arabic Vocabulary', 'Arabic', 'Marhaban (Hello), Shukran (Thank you), Min fadlik (Please)');
