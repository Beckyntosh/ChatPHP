-- Create LanguageModule table
CREATE TABLE IF NOT EXISTS LanguageModule (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(30) NOT NULL,
level VARCHAR(30),
vocab_list TEXT,
reg_date TIMESTAMP
);

-- Insert values into LanguageModule table
INSERT INTO LanguageModule (language, level, vocab_list) VALUES ('Spanish', 'Beginner', 'hello,world');
INSERT INTO LanguageModule (language, level, vocab_list) VALUES ('French', 'Intermediate', 'bonjour,merci');
INSERT INTO LanguageModule (language, level, vocab_list) VALUES ('German', 'Advanced', 'hallo,guten tag');
INSERT INTO LanguageModule (language, level, vocab_list) VALUES ('Italian', 'Beginner', 'ciao,grazie');
INSERT INTO LanguageModule (language, level, vocab_list) VALUES ('Japanese', 'Intermediate', 'konnichiwa,arigato');
INSERT INTO LanguageModule (language, level, vocab_list) VALUES ('Chinese', 'Advanced', 'ni hao,xie xie');
INSERT INTO LanguageModule (language, level, vocab_list) VALUES ('Russian', 'Beginner', 'privet,spasibo');
INSERT INTO LanguageModule (language, level, vocab_list) VALUES ('Portuguese', 'Intermediate', 'ola,obrigado');
INSERT INTO LanguageModule (language, level, vocab_list) VALUES ('Arabic', 'Advanced', 'marhaba,shukran');
INSERT INTO LanguageModule (language, level, vocab_list) VALUES ('Korean', 'Beginner', 'annyeong,hamsseumnida');