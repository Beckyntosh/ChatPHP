CREATE TABLE IF NOT EXISTS cameras (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
camera_name VARCHAR(30) NOT NULL,
location VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO cameras (camera_name, location) VALUES ('Camera 1', 'Office');
INSERT INTO cameras (camera_name, location) VALUES ('Camera 2', 'Home');
INSERT INTO cameras (camera_name, location) VALUES ('Camera 3', 'Store');
INSERT INTO cameras (camera_name, location) VALUES ('Camera 4', 'School');
INSERT INTO cameras (camera_name, location) VALUES ('Camera 5', 'Hospital');
INSERT INTO cameras (camera_name, location) VALUES ('Camera 6', 'Park');
INSERT INTO cameras (camera_name, location) VALUES ('Camera 7', 'Restaurant');
INSERT INTO cameras (camera_name, location) VALUES ('Camera 8', 'Airport');
INSERT INTO cameras (camera_name, location) VALUES ('Camera 9', 'Mall');
INSERT INTO cameras (camera_name, location) VALUES ('Camera 10', 'Library');
