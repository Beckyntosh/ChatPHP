CREATE TABLE IF NOT EXISTS driver_licenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO driver_licenses (user_id, file_path) VALUES (1, 'uploads/driver_license1.jpg');
INSERT INTO driver_licenses (user_id, file_path) VALUES (1, 'uploads/driver_license2.jpg');
INSERT INTO driver_licenses (user_id, file_path) VALUES (1, 'uploads/driver_license3.jpg');
INSERT INTO driver_licenses (user_id, file_path) VALUES (1, 'uploads/driver_license4.jpg');
INSERT INTO driver_licenses (user_id, file_path) VALUES (1, 'uploads/driver_license5.jpg');
INSERT INTO driver_licenses (user_id, file_path) VALUES (1, 'uploads/driver_license6.jpg');
INSERT INTO driver_licenses (user_id, file_path) VALUES (1, 'uploads/driver_license7.jpg');
INSERT INTO driver_licenses (user_id, file_path) VALUES (1, 'uploads/driver_license8.jpg');
INSERT INTO driver_licenses (user_id, file_path) VALUES (1, 'uploads/driver_license9.jpg');
INSERT INTO driver_licenses (user_id, file_path) VALUES (1, 'uploads/driver_license10.jpg');