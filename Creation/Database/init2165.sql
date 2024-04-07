CREATE TABLE IF NOT EXISTS Languages (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(2) NOT NULL,
    name VARCHAR(30) NOT NULL
);

INSERT INTO Languages (code, name) VALUES ('en', 'English');
INSERT INTO Languages (code, name) VALUES ('es', 'Spanish');
INSERT INTO Languages (code, name) VALUES ('fr', 'French');
INSERT INTO Languages (code, name) VALUES ('de', 'German');
INSERT INTO Languages (code, name) VALUES ('it', 'Italian');
INSERT INTO Languages (code, name) VALUES ('jp', 'Japanese');
INSERT INTO Languages (code, name) VALUES ('cn', 'Chinese');
INSERT INTO Languages (code, name) VALUES ('kr', 'Korean');
INSERT INTO Languages (code, name) VALUES ('ru', 'Russian');
INSERT INTO Languages (code, name) VALUES ('ar', 'Arabic');
