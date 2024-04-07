CREATE TABLE IF NOT EXISTS clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    company_name VARCHAR(30) NOT NULL,
    contact_name VARCHAR(30),
    contact_email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Acme Corp', 'John Doe', 'john.doe@acmecorp.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('XYZ Ltd', 'Alice Smith', 'alice.smith@xyz.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('ABC Inc', 'Bob Johnson', 'bob.johnson@abcinc.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Goldman Sachs', 'Mary Brown', 'mary.brown@goldmansachs.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Tech Solutions', 'Michael Lee', 'michael.lee@techsolutions.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Sunset Corporation', 'Laura Miller', 'laura.miller@sunsetcorp.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Global Enterprises', 'James Wilson', 'james.wilson@globent.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Silverline Group', 'Emily Davis', 'emily.davis@silverline.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Innovate Inc', 'Andrew White', 'andrew.white@innovate.com');
INSERT INTO clients (company_name, contact_name, contact_email) VALUES ('Mega Tech', 'Sarah Clark', 'sarah.clark@megatech.com');
