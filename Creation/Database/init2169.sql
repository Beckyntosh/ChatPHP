CREATE TABLE IF NOT EXISTS language_selection (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    language_code VARCHAR(5) NOT NULL,
    language_name VARCHAR(50) NOT NULL,
    UNIQUE (language_code)
);

INSERT INTO language_selection (language_code, language_name) VALUES ('en', 'English') ON DUPLICATE KEY UPDATE language_name=VALUES(language_name);
INSERT INTO language_selection (language_code, language_name) VALUES ('es', 'Spanish') ON DUPLICATE KEY UPDATE language_name=VALUES(language_name);
INSERT INTO language_selection (language_code, language_name) VALUES ('fr', 'French') ON DUPLICATE KEY UPDATE language_name=VALUES(language_name);
INSERT INTO language_selection (language_code, language_name) VALUES ('de', 'German') ON DUPLICATE KEY UPDATE language_name=VALUES(language_name);
INSERT INTO language_selection (language_code, language_name) VALUES ('it', 'Italian') ON DUPLICATE KEY UPDATE language_name=VALUES(language_name);
INSERT INTO language_selection (language_code, language_name) VALUES ('pt', 'Portuguese') ON DUPLICATE KEY UPDATE language_name=VALUES(language_name);
INSERT INTO language_selection (language_code, language_name) VALUES ('ru', 'Russian') ON DUPLICATE KEY UPDATE language_name=VALUES(language_name);
INSERT INTO language_selection (language_code, language_name) VALUES ('ar', 'Arabic') ON DUPLICATE KEY UPDATE language_name=VALUES(language_name);
INSERT INTO language_selection (language_code, language_name) VALUES ('hi', 'Hindi') ON DUPLICATE KEY UPDATE language_name=VALUES(language_name);
INSERT INTO language_selection (language_code, language_name) VALUES ('ja', 'Japanese') ON DUPLICATE KEY UPDATE language_name=VALUES(language_name);
