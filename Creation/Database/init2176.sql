CREATE TABLE IF NOT EXISTS languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(5) NOT NULL,
    name VARCHAR(50) NOT NULL
);

INSERT INTO languages (code, name) VALUES ('en', 'English');
INSERT INTO languages (code, name) VALUES ('es', 'Spanish');
INSERT INTO languages (code, name) VALUES ('fr', 'French');
INSERT INTO languages (code, name) VALUES ('de', 'German');
INSERT INTO languages (code, name) VALUES ('it', 'Italian');
INSERT INTO languages (code, name) VALUES ('ja', 'Japanese');
INSERT INTO languages (code, name) VALUES ('ko', 'Korean');
INSERT INTO languages (code, name) VALUES ('ru', 'Russian');
INSERT INTO languages (code, name) VALUES ('zh', 'Chinese');
INSERT INTO languages (code, name) VALUES ('pt', 'Portuguese');