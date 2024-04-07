CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(30) NOT NULL,
    added TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, email) VALUES ('Acme Corp', 'acme@example.com');
INSERT INTO clients (name, email) VALUES ('XYZ Company', 'xyz@example.com');
INSERT INTO clients (name, email) VALUES ('ABC Enterprises', 'abc@example.com');
INSERT INTO clients (name, email) VALUES ('Tech Solutions Ltd.', 'tech@example.com');
INSERT INTO clients (name, email) VALUES ('Global Trading Co.', 'global@example.com');
INSERT INTO clients (name, email) VALUES ('Wonder Foods Ltd.', 'wonder@example.com');
INSERT INTO clients (name, email) VALUES ('Innovative Designs Inc.', 'innovative@example.com');
INSERT INTO clients (name, email) VALUES ('Smart Solutions Co.', 'smart@example.com');
INSERT INTO clients (name, email) VALUES ('Creative Crafts LLC', 'creative@example.com');
INSERT INTO clients (name, email) VALUES ('Quality Foods Inc.', 'quality@example.com');
