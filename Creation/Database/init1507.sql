CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
contact_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, contact_email) VALUES ('Acme Corp', 'acme@example.com');
INSERT INTO clients (name, contact_email) VALUES ('XYZ Corporation', 'xyz@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Tech Solutions Ltd', 'info@techsolutions.com');
INSERT INTO clients (name, contact_email) VALUES ('Global Innovations Inc', 'contact@globalinnovations.com');
INSERT INTO clients (name, contact_email) VALUES ('Future Enterprises', 'info@futureenterprises.com');
INSERT INTO clients (name, contact_email) VALUES ('Innovate Co.', 'hello@innovateco.com');
INSERT INTO clients (name, contact_email) VALUES ('Smart Industries', 'info@smartindustries.com');
INSERT INTO clients (name, contact_email) VALUES ('Blue Ribbon Group', 'contact@blueribbongroup.com');
INSERT INTO clients (name, contact_email) VALUES ('Sunrise Solutions', 'hello@sunrisesolutions.com');
INSERT INTO clients (name, contact_email) VALUES ('Top Notch Enterprises', 'info@topnotch.com');
