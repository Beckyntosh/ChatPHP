CREATE TABLE IF NOT EXISTS Gadgets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
gadget_id INT(6) UNSIGNED,
author VARCHAR(50),
rating INT(1),
comment TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (gadget_id) REFERENCES Gadgets(id)
);

INSERT INTO Gadgets (name, description) VALUES ('Smartphone', 'A mobile phone with advanced features');
INSERT INTO Gadgets (name, description) VALUES ('Laptop', 'A portable computer for professional use');
INSERT INTO Gadgets (name, description) VALUES ('Smartwatch', 'A wearable device that tracks fitness and notifications');
INSERT INTO Gadgets (name, description) VALUES ('Tablet', 'A handheld device with a touch screen for multimedia consumption');
INSERT INTO Gadgets (name, description) VALUES ('Bluetooth Speaker', 'Wireless speaker for music playback');
INSERT INTO Gadgets (name, description) VALUES ('Action Camera', 'Compact camera for capturing outdoor adventures');
INSERT INTO Gadgets (name, description) VALUES ('Wireless Earbuds', 'Small earphones without cables for convenience');
INSERT INTO Gadgets (name, description) VALUES ('Gaming Console', 'Video game system for entertainment');
INSERT INTO Gadgets (name, description) VALUES ('Fitness Tracker', 'Device for monitoring physical activity and health metrics');
INSERT INTO Gadgets (name, description) VALUES ('Digital Camera', 'Camera for capturing high-quality images and videos');
