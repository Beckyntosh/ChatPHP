CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    client_name VARCHAR(100) NOT NULL,
    contact_email VARCHAR(50) NOT NULL,
    contact_phone VARCHAR(20),
    reg_date TIMESTAMP
);

INSERT INTO clients (client_name, contact_email, contact_phone) VALUES ('Acme Corp', 'acme@example.com', '123-456-7890');
INSERT INTO clients (client_name, contact_email, contact_phone) VALUES ('XYZ Company', 'xyz@example.com', '456-789-0123');
INSERT INTO clients (client_name, contact_email, contact_phone) VALUES ('Sample Inc', 'sample@example.com', '789-012-3456');
INSERT INTO clients (client_name, contact_email, contact_phone) VALUES ('ABC Corporation', 'abc@example.com', '987-654-3210');
INSERT INTO clients (client_name, contact_email, contact_phone) VALUES ('Best Products Ltd', 'best@example.com', '543-210-9876');
INSERT INTO clients (client_name, contact_email, contact_phone) VALUES ('Superior Goods Co', 'superior@example.com', '654-321-0987');
INSERT INTO clients (client_name, contact_email, contact_phone) VALUES ('Top Brands LLC', 'top@example.com', '210-987-5432');
INSERT INTO clients (client_name, contact_email, contact_phone) VALUES ('Future Innovations', 'future@example.com', '321-098-7654');
INSERT INTO clients (client_name, contact_email, contact_phone) VALUES ('Global Enterprises', 'global@example.com', '012-345-6789');
INSERT INTO clients (client_name, contact_email, contact_phone) VALUES ('Innovate Solutions', 'innovate@example.com', '876-543-2109');
