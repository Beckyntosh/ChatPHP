CREATE TABLE IF NOT EXISTS clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO clients (name, email, phone) VALUES ('Acme Corp', 'acme@example.com', '123-456-7890');
INSERT INTO clients (name, email, phone) VALUES ('Tech Inc', 'tech@example.com', '987-654-3210');
INSERT INTO clients (name, email, phone) VALUES ('Alpha Co', 'alpha@example.com', '345-678-9012');
INSERT INTO clients (name, email, phone) VALUES ('Beta Ltd', 'beta@example.com', '567-890-1234');
INSERT INTO clients (name, email, phone) VALUES ('Gamma Corp', 'gamma@example.com', '678-901-2345');
INSERT INTO clients (name, email, phone) VALUES ('Innovate LLC', 'innovate@example.com', '789-012-3456');
INSERT INTO clients (name, email, phone) VALUES ('Solutions Co', 'solutions@example.com', '890-123-4567');
INSERT INTO clients (name, email, phone) VALUES ('Global Enterprises', 'global@example.com', '901-234-5678');
INSERT INTO clients (name, email, phone) VALUES ('Future Tech', 'future@example.com', '012-345-6789');
INSERT INTO clients (name, email, phone) VALUES ('Digital Systems', 'digital@example.com', '234-567-8901');
