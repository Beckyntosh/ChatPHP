CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    contact_email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, contact_email) VALUES ('Acme Corp', 'info@acmecorp.com');
INSERT INTO clients (name, contact_email) VALUES ('ABC Company', 'info@abccompany.com');
INSERT INTO clients (name, contact_email) VALUES ('XYZ Ltd', 'info@xyzltd.com');
INSERT INTO clients (name, contact_email) VALUES ('123 Enterprises', 'info@123enterprises.com');
INSERT INTO clients (name, contact_email) VALUES ('Quick Services', 'info@quickservices.com');
INSERT INTO clients (name, contact_email) VALUES ('Global Solutions', 'info@globalsolutions.com');
INSERT INTO clients (name, contact_email) VALUES ('Beta Industries', 'info@betaindustries.com');
INSERT INTO clients (name, contact_email) VALUES ('Silver Group', 'info@silvergroup.com');
INSERT INTO clients (name, contact_email) VALUES ('Green Innovations', 'info@greeninnovations.com');
INSERT INTO clients (name, contact_email) VALUES ('Golden Partners', 'info@goldenpartners.com');
