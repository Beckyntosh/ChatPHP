CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(32) NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
event_date DATE NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', '5f4dcc3b5aa765d61d8327deb882cf99'),
('jane_smith', 'jane.smith@example.com', '202cb962ac59075b964b07152d234b70'),
('mike_jones', 'mike.jones@example.com', '900150983cd24fb0d6963f7d28e17f72'),
('susan_wilson', 'susan.wilson@example.com', '3b25c7e7c496696dc3bb167d08f84d8b'),
('chris_adams', 'chris.adams@example.com', 'db3358f67edc54af78a66f55a4287ddb'),
('lisa_garcia', 'lisa.garcia@example.com', 'f9b07c6c6d7e546b71967590e1e14b18'),
('alex_miller', 'alex.miller@example.com', '32c1b28f057f14d4bfe101f68b30095e'),
('emma_clark', 'emma.clark@example.com', '7157a43eeaf6a1c8182189b8ab1611f1'),
('ryan_scott', 'ryan.scott@example.com', '2290197c995c071b7241dcf853b3f4cd'),
('sophia_nelson', 'sophia.nelson@example.com', 'bb0aedabbce3f60da2c8dd7dd69e1ab5');