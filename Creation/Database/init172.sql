
CREATE TABLE IF NOT EXISTS Cameras (
id INT AUTO_INCREMENT PRIMARY KEY,
cameraName VARCHAR(255) NOT NULL,
location VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Cameras (cameraName, location) VALUES ('Camera 1', 'Location 1');
INSERT INTO Cameras (cameraName, location) VALUES ('Camera 2', 'Location 2');
INSERT INTO Cameras (cameraName, location) VALUES ('Camera 3', 'Location 3');
INSERT INTO Cameras (cameraName, location) VALUES ('Camera 4', 'Location 4');
INSERT INTO Cameras (cameraName, location) VALUES ('Camera 5', 'Location 5');
INSERT INTO Cameras (cameraName, location) VALUES ('Camera 6', 'Location 6');
INSERT INTO Cameras (cameraName, location) VALUES ('Camera 7', 'Location 7');
INSERT INTO Cameras (cameraName, location) VALUES ('Camera 8', 'Location 8');
INSERT INTO Cameras (cameraName, location) VALUES ('Camera 9', 'Location 9');
INSERT INTO Cameras (cameraName, location) VALUES ('Camera 10', 'Location 10');