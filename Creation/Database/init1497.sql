CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(15),
    reg_date TIMESTAMP
);

INSERT INTO clients (name, email, phone) VALUES ('Acme Corp', 'acme@example.com', '555-1234');
INSERT INTO clients (name, email, phone) VALUES ('XYZ Company', 'xyz@example.com', '555-5678');
INSERT INTO clients (name, email, phone) VALUES ('ABC Corporation', 'abc@example.com', '555-9101');
INSERT INTO clients (name, email, phone) VALUES ('123 Enterprises', '123@example.com', '555-1122');
INSERT INTO clients (name, email, phone) VALUES ('Best Co.', 'best@example.com', '555-3344');
INSERT INTO clients (name, email, phone) VALUES ('Top Partners', 'top@example.com', '555-5566');
INSERT INTO clients (name, email, phone) VALUES ('Great Solutions', 'great@example.com', '555-7788');
INSERT INTO clients (name, email, phone) VALUES ('Innovative Innovations', 'innovative@example.com', '555-9900');
INSERT INTO clients (name, email, phone) VALUES ('Tech Titans', 'tech@example.com', '555-1122');
INSERT INTO clients (name, email, phone) VALUES ('Blue Sky Group', 'blue@example.com', '555-3344');
