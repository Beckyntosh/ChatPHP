CREATE TABLE language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    module_name VARCHAR(50),
    language VARCHAR(50),
    level VARCHAR(50),
    vocab_list TEXT,
    reg_date TIMESTAMP
);

INSERT INTO language_modules (module_name, language, level, vocab_list)
VALUES ('Spanish for Beginners', 'Spanish', 'Beginner', 'Hola, Adiós, Por favor, Gracias'),
       ('French Essentials', 'French', 'Intermediate', 'Bonjour, Merci, Au revoir'),
       ('German Vocabulary', 'German', 'Advanced', 'Guten Morgen, Auf Wiedersehen, Danke'),
       ('Italian Basics', 'Italian', 'Beginner', 'Ciao, Grazie, Prego'),
       ('Japanese Phrases', 'Japanese', 'Intermediate', 'Konnichiwa, Arigatou, Sayonara'),
       ('Chinese Characters', 'Chinese', 'Advanced', '你好, 谢谢, 再见'),
       ('Russian Words', 'Russian', 'Intermediate', 'Привет, Спасибо, Пока'),
       ('Portuguese Expressions', 'Portuguese', 'Beginner', 'Oi, Obrigado, Por favor'),
       ('Korean Vocabulary', 'Korean', 'Intermediate', '안녕하세요, 감사합니다, 안녕히 가세요'),
       ('Arabic Basics', 'Arabic', 'Beginner', 'مرحبا, شكرا, الرجاء');