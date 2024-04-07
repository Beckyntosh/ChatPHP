CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
contact_name VARCHAR(30) NOT NULL,
contact_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, contact_name, contact_email) VALUES ('Acme Corp', 'John Doe', 'john.doe@acmecorp.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('XYZ Company', 'Jane Smith', 'jane.smith@xyzcompany.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('ABC Corporation', 'Mark Johnson', 'mark.johnson@abccorp.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('123 Enterprises', 'Sarah Williams', 'sarah.williams@123enterprises.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Best Products Ltd', 'Chris Brown', 'chris.brown@bestproducts.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Great Services Inc', 'Emily Taylor', 'emily.taylor@greatservicesinc.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Future Tech Group', 'Alex Roberts', 'alex.roberts@futuretechgroup.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Global Solutions LLC', 'Laura Davis', 'laura.davis@globalsolutionsllc.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('New Horizons Enterprises', 'Michael Smith', 'michael.smith@newhorizons.com');
INSERT INTO clients (name, contact_name, contact_email) VALUES ('Sunrise Industries', 'Samantha Wilson', 'samantha.wilson@sunriseindustries.com');
