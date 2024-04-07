CREATE TABLE IF NOT EXISTS language_modules (
    id INT AUTO_INCREMENT PRIMARY KEY,
    module_name VARCHAR(255) NOT NULL,
    language VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO language_modules (module_name, language, content) VALUES ('Spanish for beginners', 'Spanish', 'This module covers basic vocabulary for beginners in Spanish');
INSERT INTO language_modules (module_name, language, content) VALUES ('French for travelers', 'French', 'Learn essential phrases for traveling in France');
INSERT INTO language_modules (module_name, language, content) VALUES ('German gastronomy', 'German', 'Explore German food and drink vocabulary');
INSERT INTO language_modules (module_name, language, content) VALUES ('Italian art terms', 'Italian', 'Study art-related terms in Italian');
INSERT INTO language_modules (module_name, language, content) VALUES ('Mandarin business phrases', 'Mandarin', 'Key phrases for business communication in Mandarin');
INSERT INTO language_modules (module_name, language, content) VALUES ('Japanese cultural insights', 'Japanese', 'Discover cultural insights and customs in Japan');
INSERT INTO language_modules (module_name, language, content) VALUES ('Russian literature terms', 'Russian', 'Learn terminology related to Russian literature');
INSERT INTO language_modules (module_name, language, content) VALUES ('Portuguese travel phrases', 'Portuguese', 'Useful phrases for travelers in Portugal');
INSERT INTO language_modules (module_name, language, content) VALUES ('Arabic greetings', 'Arabic', 'Common greetings and expressions in Arabic');
INSERT INTO language_modules (module_name, language, content) VALUES ('Korean entertainment vocab', 'Korean', 'Learn vocabulary related to Korean entertainment industry');
