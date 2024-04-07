CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, email, phone) VALUES ('Acme Corp', 'acme@acme.com', '555-1234');
INSERT INTO clients (name, email, phone) VALUES ('XYZ Company', 'xyz@xyz.com', '555-5678');
INSERT INTO clients (name, email, phone) VALUES ('ABC Ltd', 'abc@abc.com', '555-9012');
INSERT INTO clients (name, email, phone) VALUES ('123 Industries', '123@123.com', '555-3456');
INSERT INTO clients (name, email, phone) VALUES ('Best Co.', 'best@best.com', '555-7890');
INSERT INTO clients (name, email, phone) VALUES ('Top Corp', 'top@top.com', '555-2345');
INSERT INTO clients (name, email, phone) VALUES ('Global Enterprises', 'global@global.com', '555-6789');
INSERT INTO clients (name, email, phone) VALUES ('Mega Ltd', 'mega@mega.com', '555-0123');
INSERT INTO clients (name, email, phone) VALUES ('Superior Inc', 'superior@superior.com', '555-4567');
INSERT INTO clients (name, email, phone) VALUES ('Elite Co.', 'elite@elite.com', '555-8901');
