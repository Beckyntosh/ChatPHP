CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
contact_number VARCHAR(15),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, email, contact_number) VALUES ('Acme Corp', 'acme@example.com', '1234567890');
INSERT INTO clients (name, email, contact_number) VALUES ('XYZ Company', 'xyz@example.com', '9876543210');
INSERT INTO clients (name, email, contact_number) VALUES ('Sunny Services', 'sunny@example.com', '3456789012');
INSERT INTO clients (name, email, contact_number) VALUES ('Tech Solutions', 'tech@example.com', '6789012345');
INSERT INTO clients (name, email, contact_number) VALUES ('Global Industries', 'global@example.com', '4567890123');
INSERT INTO clients (name, email, contact_number) VALUES ('Dynamic Innovations', 'dynamic@example.com', '8901234567');
INSERT INTO clients (name, email, contact_number) VALUES ('Infinite Ventures', 'infinite@example.com', '2345678901');
INSERT INTO clients (name, email, contact_number) VALUES ('Peak Performance', 'peak@example.com', '5678901234');
INSERT INTO clients (name, email, contact_number) VALUES ('Alpha Solutions', 'alpha@example.com', '0123456789');
INSERT INTO clients (name, email, contact_number) VALUES ('Omega Enterprises', 'omega@example.com', '6789012345');
