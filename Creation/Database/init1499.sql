CREATE TABLE IF NOT EXISTS Clients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    clientName VARCHAR(30) NOT NULL,
    contactEmail VARCHAR(50),
    contactNumber VARCHAR(15),
    reg_date TIMESTAMP
);

INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES ('Acme Corp', 'acme@example.com', '1234567890');
INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES ('ABC Company', 'abc@example.com', '9876543210');
INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES ('XYZ Corporation', 'xyz@example.com', '5556667777');
INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES ('Eco Products Ltd.', 'eco@example.com', '1112223333');
INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES ('Fresh Farms Inc.', 'fresh@example.com', '4445556666');
INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES ('Health Haven', 'health@example.com', '7778889999');
INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES ('Green Goods Company', 'green@example.com', '9998887777');
INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES ('Natural Harvest', 'harvest@example.com', '3332221111');
INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES ('Bio Essentials', 'bio@example.com', '6667778888');
INSERT INTO Clients (clientName, contactEmail, contactNumber) VALUES ('Plant Power Inc.', 'plant@example.com', '1231231234');
