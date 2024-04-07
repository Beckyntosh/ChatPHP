CREATE TABLE IF NOT EXISTS clients (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  contact_email VARCHAR(255),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO clients (name, contact_email) VALUES ('Acme Corp', 'acme@example.com');
INSERT INTO clients (name, contact_email) VALUES ('XYZ Inc', 'xyz@example.com');
INSERT INTO clients (name, contact_email) VALUES ('ABC Co', 'abc@example.com');
INSERT INTO clients (name, contact_email) VALUES ('123 Agency', '123@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Best Retail', 'best@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Sunshine Enterprises', 'sunshine@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Green Solutions', 'green@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Ocean Blue', 'ocean@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Peak Performance', 'peak@example.com');
INSERT INTO clients (name, contact_email) VALUES ('Clear Vision', 'clear@example.com');
