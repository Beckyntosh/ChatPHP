CREATE TABLE IF NOT EXISTS Clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
contact_email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Clients (name, contact_email) VALUES ('Acme Corp', 'acme@acmecorp.com');
INSERT INTO Clients (name, contact_email) VALUES ('XYZ Corp', 'xyz@xyzcorp.com');
INSERT INTO Clients (name, contact_email) VALUES ('Best Inc', 'best@bestinc.com');
INSERT INTO Clients (name, contact_email) VALUES ('Top Co', 'top@topco.com');
INSERT INTO Clients (name, contact_email) VALUES ('Super Corp', 'super@supercorp.com');
INSERT INTO Clients (name, contact_email) VALUES ('Mega Ltd', 'mega@megaltd.com');
INSERT INTO Clients (name, contact_email) VALUES ('Global Corp', 'global@globalcorp.com');
INSERT INTO Clients (name, contact_email) VALUES ('Tech Solutions', 'tech@techsolutions.com');
INSERT INTO Clients (name, contact_email) VALUES ('Innovation Co', 'innovation@innovationco.com');
INSERT INTO Clients (name, contact_email) VALUES ('Prime Enterprises', 'prime@primeent.com');
