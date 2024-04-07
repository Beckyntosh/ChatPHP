CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
contact_email VARCHAR(50),
contact_phone VARCHAR(20),
reg_date TIMESTAMP
);

INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Acme Corp', 'acme@acmecorp.com', '555-1234');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Tech Solutions', 'info@techsolutions.com', '555-5678');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Global Enterprises', 'contact@globalent.com', '555-9876');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Food Co.', 'info@foodco.com', '555-4321');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Fashion Boutique', 'hello@fashionboutique.com', '555-8765');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Software Inc.', 'support@softwareinc.com', '555-2109');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Home Decor', 'sales@homedecor.com', '555-6543');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Health Clinic', 'info@healthclinic.com', '555-1039');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Auto Shop', 'service@autoshop.com', '555-7890');
INSERT INTO clients (name, contact_email, contact_phone) VALUES ('Bookstore', 'books@bookstore.com', '555-3456');
