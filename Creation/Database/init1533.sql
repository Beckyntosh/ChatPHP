CREATE TABLE IF NOT EXISTS language_modules (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    language VARCHAR(30) NOT NULL,
    content TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO language_modules (title, language, content) VALUES ('Spanish for beginners', 'Spanish', 'Common vocabulary for beginners');
INSERT INTO language_modules (title, language, content) VALUES ('French Basics', 'French', 'Introductory phrases and words');
INSERT INTO language_modules (title, language, content) VALUES ('German Essentials', 'German', 'Key vocabulary for everyday conversations');
INSERT INTO language_modules (title, language, content) VALUES ('Italian Insights', 'Italian', 'Useful phrases for travelers');
INSERT INTO language_modules (title, language, content) VALUES ('Japanese Journey', 'Japanese', 'Beginner vocabulary and expressions');
INSERT INTO language_modules (title, language, content) VALUES ('Mandarin Masterclass', 'Mandarin', 'Essential words and sentences');
INSERT INTO language_modules (title, language, content) VALUES ('Russian Recap', 'Russian', 'Basic grammar and vocabulary review');
INSERT INTO language_modules (title, language, content) VALUES ('Portuguese Primer', 'Portuguese', 'Intro to Portuguese language and culture');
INSERT INTO language_modules (title, language, content) VALUES ('Korean Kickoff', 'Korean', 'Starting point for learning Korean language');
INSERT INTO language_modules (title, language, content) VALUES ('Arabic Alphabets', 'Arabic', 'Learning Arabic letters and sounds');
