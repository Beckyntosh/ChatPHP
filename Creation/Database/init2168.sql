CREATE TABLE IF NOT EXISTS LANGUAGES (
id INT AUTO_INCREMENT PRIMARY KEY,
code VARCHAR(5) NOT NULL,
name VARCHAR(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO LANGUAGES (code, name) VALUES ('en', 'English') ON DUPLICATE KEY UPDATE name = 'English';
INSERT INTO LANGUAGES (code, name) VALUES ('es', 'Spanish') ON DUPLICATE KEY UPDATE name = 'Spanish';
INSERT INTO LANGUAGES (code, name) VALUES ('fr', 'French') ON DUPLICATE KEY UPDATE name = 'French';
INSERT INTO LANGUAGES (code, name) VALUES ('de', 'German') ON DUPLICATE KEY UPDATE name = 'German';
INSERT INTO LANGUAGES (code, name) VALUES ('it', 'Italian') ON DUPLICATE KEY UPDATE name = 'Italian';
INSERT INTO LANGUAGES (code, name) VALUES ('pt', 'Portuguese') ON DUPLICATE KEY UPDATE name = 'Portuguese';
INSERT INTO LANGUAGES (code, name) VALUES ('jp', 'Japanese') ON DUPLICATE KEY UPDATE name = 'Japanese';
INSERT INTO LANGUAGES (code, name) VALUES ('cn', 'Chinese') ON DUPLICATE KEY UPDATE name = 'Chinese';
INSERT INTO LANGUAGES (code, name) VALUES ('kr', 'Korean') ON DUPLICATE KEY UPDATE name = 'Korean';
INSERT INTO LANGUAGES (code, name) VALUES ('ru', 'Russian') ON DUPLICATE KEY UPDATE name = 'Russian';
