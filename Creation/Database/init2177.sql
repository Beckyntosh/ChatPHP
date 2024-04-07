CREATE TABLE IF NOT EXISTS languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language_code VARCHAR(5) NOT NULL,
language_name VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO languages (language_code, language_name) VALUES ('en', 'English');
INSERT INTO languages (language_code, language_name) VALUES ('es', 'Spanish');
INSERT INTO languages (language_code, language_name) VALUES ('fr', 'French');
INSERT INTO languages (language_code, language_name) VALUES ('de', 'German');
INSERT INTO languages (language_code, language_name) VALUES ('it', 'Italian');
INSERT INTO languages (language_code, language_name) VALUES ('jp', 'Japanese');
INSERT INTO languages (language_code, language_name) VALUES ('ko', 'Korean');
INSERT INTO languages (language_code, language_name) VALUES ('pt', 'Portuguese');
INSERT INTO languages (language_code, language_name) VALUES ('ru', 'Russian');
INSERT INTO languages (language_code, language_name) VALUES ('zh', 'Chinese');
