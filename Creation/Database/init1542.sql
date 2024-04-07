CREATE TABLE IF NOT EXISTS language_content (
    id INT AUTO_INCREMENT PRIMARY KEY,
    language VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO language_content (language, content) VALUES ('Spanish', 'Hola means hello in Spanish');
INSERT INTO language_content (language, content) VALUES ('French', 'Bonjour means hello in French');
INSERT INTO language_content (language, content) VALUES ('Mandarin', '你好 means hello in Mandarin');
INSERT INTO language_content (language, content) VALUES ('German', 'Guten Tag means hello in German');
INSERT INTO language_content (language, content) VALUES ('Japanese', 'こんにちは means hello in Japanese');
INSERT INTO language_content (language, content) VALUES ('Italian', 'Ciao means hello in Italian');
INSERT INTO language_content (language, content) VALUES ('Korean', '안녕하세요 means hello in Korean');
INSERT INTO language_content (language, content) VALUES ('Russian', 'Здравствуйте means hello in Russian');
INSERT INTO language_content (language, content) VALUES ('Arabic', 'مرحبا means hello in Arabic');
INSERT INTO language_content (language, content) VALUES ('Portuguese', 'Olá means hello in Portuguese');
