CREATE TABLE IF NOT EXISTS SecurityCameras (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
location VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO SecurityCameras (name, location) VALUES ('Nest Cam Outdoor', 'Living Room');
INSERT INTO SecurityCameras (name, location) VALUES ('Arlo Pro 3', 'Front Yard');
INSERT INTO SecurityCameras (name, location) VALUES ('Ring Spotlight Cam', 'Backyard');
INSERT INTO SecurityCameras (name, location) VALUES ('Blink Outdoor', 'Garage');
INSERT INTO SecurityCameras (name, location) VALUES ('Wyze Cam Pan', 'Office');
INSERT INTO SecurityCameras (name, location) VALUES ('Google Nest Cam Indoor', 'Bedroom');
INSERT INTO SecurityCameras (name, location) VALUES ('EufyCam 2', 'Kitchen');
INSERT INTO SecurityCameras (name, location) VALUES ('Logitech Circle 2', 'Patio');
INSERT INTO SecurityCameras (name, location) VALUES ('SimpliSafe Camera', 'Driveway');
INSERT INTO SecurityCameras (name, location) VALUES ('Swann Wi-Fi Indoor Security Camera', 'Basement');
