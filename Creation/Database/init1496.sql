CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    contact_email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert at least 10 values into the clients table
INSERT INTO clients (name, contact_email) VALUES ('Acme Corp', 'acme@example.com');
INSERT INTO clients (name, contact_email) VALUES ('XYZ Ltd', 'xyz@example.com');
INSERT INTO clients (name, contact_email) VALUES ('ABC Company', 'abc@example.com');
INSERT INTO clients (name, contact_email) VALUES ('MNO Corporation', 'mno@example.com');
INSERT INTO clients (name, contact_email) VALUES ('PQR Enterprises', 'pqr@example.com');
INSERT INTO clients (name, contact_email) VALUES ('LMN Co.', 'lmn@example.com');
INSERT INTO clients (name, contact_email) VALUES ('UVW Group', 'uvw@example.com');
INSERT INTO clients (name, contact_email) VALUES ('RST Inc.', 'rst@example.com');
INSERT INTO clients (name, contact_email) VALUES ('OPQ Limited', 'opq@example.com');
INSERT INTO clients (name, contact_email) VALUES ('GHI Industries', 'ghi@example.com');
