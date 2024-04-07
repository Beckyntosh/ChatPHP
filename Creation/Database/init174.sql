CREATE TABLE IF NOT EXISTS cameras (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    camera_name VARCHAR(30) NOT NULL,
    location VARCHAR(30) NOT NULL,
    ip_address VARCHAR(15) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO cameras (camera_name, location, ip_address) VALUES ('Camera1', 'Living Room', '192.168.0.1');
INSERT INTO cameras (camera_name, location, ip_address) VALUES ('Camera2', 'Kitchen', '192.168.0.2');
INSERT INTO cameras (camera_name, location, ip_address) VALUES ('Camera3', 'Bedroom', '192.168.0.3');
INSERT INTO cameras (camera_name, location, ip_address) VALUES ('Camera4', 'Backyard', '192.168.0.4');
INSERT INTO cameras (camera_name, location, ip_address) VALUES ('Camera5', 'Front Door', '192.168.0.5');
INSERT INTO cameras (camera_name, location, ip_address) VALUES ('Camera6', 'Garage', '192.168.0.6');
INSERT INTO cameras (camera_name, location, ip_address) VALUES ('Camera7', 'Office', '192.168.0.7');
INSERT INTO cameras (camera_name, location, ip_address) VALUES ('Camera8', 'Basement', '192.168.0.8');
INSERT INTO cameras (camera_name, location, ip_address) VALUES ('Camera9', 'Patio', '192.168.0.9');
INSERT INTO cameras (camera_name, location, ip_address) VALUES ('Camera10', 'Hallway', '192.168.0.10');
