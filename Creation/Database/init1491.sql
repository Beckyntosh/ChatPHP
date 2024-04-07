CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, email) VALUES ('Acme Corp', 'acme@example.com');
INSERT INTO clients (name, email) VALUES ('XYZ Corp', 'xyz@example.com');
INSERT INTO clients (name, email) VALUES ('ABC Company', 'abc@example.com');
INSERT INTO clients (name, email) VALUES ('123 Inc', '123@example.com');
INSERT INTO clients (name, email) VALUES ('Best Company', 'best@example.com');
INSERT INTO clients (name, email) VALUES ('Great Corp', 'great@example.com');
INSERT INTO clients (name, email) VALUES ('Top Company', 'top@example.com');
INSERT INTO clients (name, email) VALUES ('Global Corp', 'global@example.com');
INSERT INTO clients (name, email) VALUES ('New Ventures', 'new@example.com');
INSERT INTO clients (name, email) VALUES ('Innovative Solutions', 'innovative@example.com');
