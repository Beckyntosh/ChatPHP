CREATE TABLE IF NOT EXISTS clients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  contact_email VARCHAR(50),
  contact_phone VARCHAR(15),
  reg_date TIMESTAMP
);

INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Acme Corp', 'acme@example.com', '123-456-7890');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('XYZ Inc', 'xyz@example.com', '987-654-3210');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('CDE Co', 'cde@example.com', '555-555-5555');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('LMN Ltd', 'lmn@example.com', '111-222-3333');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('PQR Enterprises', 'pqr@example.com', '444-444-4444');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('UVW Corporation', 'uvw@example.com', '777-888-9999');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('GHI Group', 'ghi@example.com', '666-666-6666');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('JKL Industries', 'jkl@example.com', '222-333-4444');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('RST Corp', 'rst@example.com', '888-999-0000');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('MNO Ltd', 'mno@example.com', '555-777-9999');
