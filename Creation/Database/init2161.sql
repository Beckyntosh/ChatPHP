CREATE TABLE IF NOT EXISTS website_languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
language_code VARCHAR(5) NOT NULL,
language_name VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO website_languages (language_code, language_name) VALUES ('en', 'English');
INSERT INTO website_languages (language_code, language_name) VALUES ('es', 'Spanish');
INSERT INTO website_languages (language_code, language_name) VALUES ('fr', 'French');
INSERT INTO website_languages (language_code, language_name) VALUES ('de', 'German');
INSERT INTO website_languages (language_code, language_name) VALUES ('it', 'Italian');
INSERT INTO website_languages (language_code, language_name) VALUES ('pt', 'Portuguese');
INSERT INTO website_languages (language_code, language_name) VALUES ('nl', 'Dutch');
INSERT INTO website_languages (language_code, language_name) VALUES ('ru', 'Russian');
INSERT INTO website_languages (language_code, language_name) VALUES ('jp', 'Japanese');
INSERT INTO website_languages (language_code, language_name) VALUES ('cn', 'Chinese');