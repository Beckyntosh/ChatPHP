CREATE TABLE IF NOT EXISTS languages (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(5) NOT NULL,
    name VARCHAR(50) NOT NULL,
    UNIQUE KEY (code)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO languages (code, name) VALUES ('en', 'English') ON DUPLICATE KEY UPDATE name = VALUES(name);
INSERT INTO languages (code, name) VALUES ('es', 'Spanish') ON DUPLICATE KEY UPDATE name = VALUES(name);
INSERT INTO languages (code, name) VALUES ('fr', 'French') ON DUPLICATE KEY UPDATE name = VALUES(name);
INSERT INTO languages (code, name) VALUES ('de', 'German') ON DUPLICATE KEY UPDATE name = VALUES(name);
INSERT INTO languages (code, name) VALUES ('it', 'Italian') ON DUPLICATE KEY UPDATE name = VALUES(name);
INSERT INTO languages (code, name) VALUES ('ja', 'Japanese') ON DUPLICATE KEY UPDATE name = VALUES(name);
INSERT INTO languages (code, name) VALUES ('ko', 'Korean') ON DUPLICATE KEY UPDATE name = VALUES(name);
INSERT INTO languages (code, name) VALUES ('pt', 'Portuguese') ON DUPLICATE KEY UPDATE name = VALUES(name);
INSERT INTO languages (code, name) VALUES ('ru', 'Russian') ON DUPLICATE KEY UPDATE name = VALUES(name);
INSERT INTO languages (code, name) VALUES ('zh', 'Chinese') ON DUPLICATE KEY UPDATE name = VALUES(name);
