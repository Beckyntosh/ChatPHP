CREATE TABLE IF NOT EXISTS wine_updates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO wine_updates (email) VALUES ('email1@example.com');
INSERT INTO wine_updates (email) VALUES ('email2@example.com');
INSERT INTO wine_updates (email) VALUES ('email3@example.com');
INSERT INTO wine_updates (email) VALUES ('email4@example.com');
INSERT INTO wine_updates (email) VALUES ('email5@example.com');
INSERT INTO wine_updates (email) VALUES ('email6@example.com');
INSERT INTO wine_updates (email) VALUES ('email7@example.com');
INSERT INTO wine_updates (email) VALUES ('email8@example.com');
INSERT INTO wine_updates (email) VALUES ('email9@example.com');
INSERT INTO wine_updates (email) VALUES ('email10@example.com');
