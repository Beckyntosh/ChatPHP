CREATE TABLE IF NOT EXISTS clients (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            contact VARCHAR(50),
            reg_date TIMESTAMP
            );

INSERT INTO clients (name, contact) VALUES ('Acme Corp', '123-456-7890');
INSERT INTO clients (name, contact) VALUES ('XYZ Company', '987-654-3210');
INSERT INTO clients (name, contact) VALUES ('ABC Inc', '555-555-5555');
INSERT INTO clients (name, contact) VALUES ('123 Corp', '111-222-3333');
INSERT INTO clients (name, contact) VALUES ('Sample Company', '999-888-7777');
INSERT INTO clients (name, contact) VALUES ('Test Corp', '777-777-7777');
INSERT INTO clients (name, contact) VALUES ('Demo Company', '123-456-7890');
INSERT INTO clients (name, contact) VALUES ('New Corp', '111-222-3333');
INSERT INTO clients (name, contact) VALUES ('Client Company', '999-888-7777');
INSERT INTO clients (name, contact) VALUES ('Final Corp', '777-777-7777');