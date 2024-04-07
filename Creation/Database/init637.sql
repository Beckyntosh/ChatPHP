CREATE TABLE IF NOT EXISTS subscribers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL
);

INSERT INTO subscribers (email) VALUES ('john.doe@example.com');
INSERT INTO subscribers (email) VALUES ('jane.smith@example.com');
INSERT INTO subscribers (email) VALUES ('adam.jones@example.com');
INSERT INTO subscribers (email) VALUES ('sarah.davis@example.com');
INSERT INTO subscribers (email) VALUES ('michael.brown@example.com');
INSERT INTO subscribers (email) VALUES ('emily.white@example.com');
INSERT INTO subscribers (email) VALUES ('chris.johnson@example.com');
INSERT INTO subscribers (email) VALUES ('laura.miller@example.com');
INSERT INTO subscribers (email) VALUES ('kevin.wilson@example.com');
INSERT INTO subscribers (email) VALUES ('olivia.jones@example.com');