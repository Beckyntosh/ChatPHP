CREATE TABLE IF NOT EXISTS uploads (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploads (filename, filepath) VALUES ('DriverLicense1.jpg', 'uploads/DriverLicense1.jpg');
INSERT INTO uploads (filename, filepath) VALUES ('DriverLicense2.jpeg', 'uploads/DriverLicense2.jpeg');
INSERT INTO uploads (filename, filepath) VALUES ('DriverLicense3.png', 'uploads/DriverLicense3.png');
INSERT INTO uploads (filename, filepath) VALUES ('DriverLicense4.jpg', 'uploads/DriverLicense4.jpg');
INSERT INTO uploads (filename, filepath) VALUES ('DriverLicense5.png', 'uploads/DriverLicense5.png');
INSERT INTO uploads (filename, filepath) VALUES ('DriverLicense6.jpg', 'uploads/DriverLicense6.jpg');
INSERT INTO uploads (filename, filepath) VALUES ('DriverLicense7.jpeg', 'uploads/DriverLicense7.jpeg');
INSERT INTO uploads (filename, filepath) VALUES ('DriverLicense8.png', 'uploads/DriverLicense8.png');
INSERT INTO uploads (filename, filepath) VALUES ('DriverLicense9.jpg', 'uploads/DriverLicense9.jpg');
INSERT INTO uploads (filename, filepath) VALUES ('DriverLicense10.jpeg', 'uploads/DriverLicense10.jpeg');
