CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
contact_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, contact_email) VALUES ('Acme Corp', 'acme@example.com');
INSERT INTO clients (name, contact_email) VALUES ('XYZ Inc', 'xyz@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Sunshine Co', 'sunshine@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Moonlight Ltd', 'moonlight@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Star Corp', 'star@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Galaxy Enterprises', 'galaxy@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Infinity Co', 'infinity@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Zenith Corp', 'zenith@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Peak Inc', 'peak@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Summit Ltd', 'summit@example.com');