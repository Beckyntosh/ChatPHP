CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    language VARCHAR(50) NOT NULL,
    content TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO language_modules (title, language, content) VALUES ('Spanish for beginners', 'Spanish', 'List of basic vocabulary words for beginners');
INSERT INTO language_modules (title, language, content) VALUES ('French Phrases', 'French', 'Common phrases used in everyday conversations in French');
INSERT INTO language_modules (title, language, content) VALUES ('German Grammar', 'German', 'Grammar rules and exercises for learning German');
INSERT INTO language_modules (title, language, content) VALUES ('Italian Vocabulary', 'Italian', 'Vocabulary list for travelers to Italy');
INSERT INTO language_modules (title, language, content) VALUES ('Chinese Characters', 'Chinese', 'Introduction to Chinese characters and stroke order');
INSERT INTO language_modules (title, language, content) VALUES ('Japanese Culture', 'Japanese', 'Insights into traditional and modern Japanese culture');
INSERT INTO language_modules (title, language, content) VALUES ('Korean Food', 'Korean', 'Information on popular Korean dishes and ingredients');
INSERT INTO language_modules (title, language, content) VALUES ('Russian Alphabet', 'Russian', 'Learning the Cyrillic alphabet and pronunciation guides');
INSERT INTO language_modules (title, language, content) VALUES ('Arabic Expressions', 'Arabic', 'Expressions and idioms commonly used in Arabic-speaking countries');
INSERT INTO language_modules (title, language, content) VALUES ('Portuguese Songs', 'Portuguese', 'Lyrics to famous Portuguese songs for language practice');
