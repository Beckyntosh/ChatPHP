CREATE TABLE IF NOT EXISTS clients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  contact_email VARCHAR(50),
  contact_phone VARCHAR(15),
  registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Acme Corp', 'acme@example.com', '123-456-7890');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('XYZ Corp', 'xyz@example.com', '987-654-3210');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('ABC Inc', 'abc@example.com', '555-123-4567');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('123 Company', '123@example.com', '444-555-6666');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('The Innovators', 'innovate@example.com', '777-888-9999');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Tech Solutions', 'tech@example.com', '222-333-4444');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Global Enterprises', 'global@example.com', '999-888-7777');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Data Experts', 'data@example.com', '666-777-8888');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Future Technologies', 'future@example.com', '111-222-3333');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Innovate IT', 'innovateit@example.com', '444-333-2222');
