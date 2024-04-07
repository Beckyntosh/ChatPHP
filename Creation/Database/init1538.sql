CREATE TABLE IF NOT EXISTS LanguageModules (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language VARCHAR(30) NOT NULL,
level VARCHAR(30) NOT NULL,
vocabulary TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO LanguageModules (language, level, vocabulary) VALUES
('Spanish', 'Beginner', 'Hola, Adiós, Por favor, Gracias, Sí, No'),
('French', 'Intermediate', 'Bonjour, Merci, Oui, Non, Au revoir'),
('German', 'Beginner', 'Hallo, Danke, Ja, Nein, Auf Wiedersehen'),
('Italian', 'Advanced', 'Ciao, Grazie, Prego, Sì, No'),
('Japanese', 'Beginner', 'こんにちは, ありがとう, はい, いいえ, さようなら'),
('Chinese', 'Intermediate', '你好, 謝謝, 是的, 不, 再見'),
('Russian', 'Intermediate', 'Привет, Спасибо, Да, Нет, До свидания'),
('Arabic', 'Advanced', 'مرحبا, شكرا, نعم, لا, وداعا'),
('Korean', 'Intermediate', '안녕하세요, 감사합니다, 네, 아니오, 안녕히 가세요'),
('Portuguese', 'Beginner', 'Olá, Obrigado, Sim, Não, Adeus');