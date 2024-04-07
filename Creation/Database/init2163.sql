CREATE TABLE IF NOT EXISTS website_languages (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
code VARCHAR(30) NOT NULL,
name VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO website_languages (code, name) VALUES ('en', 'English'), ('es', 'Spanish'), ('fr', 'French'), ('de', 'German'), ('it', 'Italian'), ('pt', 'Portuguese'), ('ja', 'Japanese'), ('ko', 'Korean'), ('zh', 'Chinese'), ('ru', 'Russian');