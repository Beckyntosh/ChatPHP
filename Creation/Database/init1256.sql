CREATE TABLE IF NOT EXISTS locations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(30) NOT NULL
);

CREATE TABLE IF NOT EXISTS plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    location_id INT(6) UNSIGNED,
    date DATE,
    details TEXT,
    FOREIGN KEY (location_id) REFERENCES locations(id)
);

INSERT INTO locations (location) VALUES ('Paris');
INSERT INTO locations (location) VALUES ('London');
INSERT INTO locations (location) VALUES ('New York');
INSERT INTO locations (location) VALUES ('Tokyo');
INSERT INTO locations (location) VALUES ('Sydney');
INSERT INTO locations (location) VALUES ('Rome');
INSERT INTO locations (location) VALUES ('Cairo');
INSERT INTO locations (location) VALUES ('Dubai');
INSERT INTO locations (location) VALUES ('Moscow');
INSERT INTO locations (location) VALUES ('Rio de Janeiro');
