CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
company_name VARCHAR(50) NOT NULL,
contact_name VARCHAR(50),
contact_email VARCHAR(50),
reg_date TIMESTAMP
);

-- Insert values into clients table
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Acme Corp', 'John Doe', 'john.doe@acme.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('XYZ Company', 'Jane Smith', 'jane.smith@xyz.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('ABC Corp', 'Alice Johnson', 'alice.johnson@abc.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('123 Inc', 'Bob Roberts', 'bob.roberts@123inc.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Best Products', 'Sarah Brown', 'sarah.brown@bestproducts.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Top Solutions', 'Mike Davis', 'mike.davis@topsolutions.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Global Enterprises', 'Emily Wilson', 'emily.wilson@global.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Tech Innovations', 'Sam Lee', 'sam.lee@techinnovations.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Sunrise Industries', 'Chris Taylor', 'chris.taylor@sunrise.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Smart Solutions', 'Linda Clark', 'linda.clark@smartsolutions.com');