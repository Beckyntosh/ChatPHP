CREATE TABLE IF NOT EXISTS languages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    code VARCHAR(10) NOT NULL UNIQUE
) ENGINE=INNODB;

INSERT IGNORE INTO languages (name, code) VALUES ('English', 'en');
INSERT IGNORE INTO languages (name, code) VALUES ('Español', 'es');
INSERT IGNORE INTO languages (name, code) VALUES ('Français', 'fr');
INSERT IGNORE INTO languages (name, code) VALUES ('Deutsch', 'de');
