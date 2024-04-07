CREATE TABLE IF NOT EXISTS scanned_documents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO scanned_documents (filename) VALUES ('uploads/driver_license1.jpg'),
('uploads/driver_license2.png'),
('uploads/driver_license3.jpeg'),
('uploads/driver_license4.jpg'),
('uploads/driver_license5.png'),
('uploads/driver_license6.jpeg'),
('uploads/driver_license7.jpg'),
('uploads/driver_license8.png'),
('uploads/driver_license9.jpeg'),
('uploads/driver_license10.jpg');