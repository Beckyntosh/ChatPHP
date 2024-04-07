CREATE TABLE IF NOT EXISTS firmware_updates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    device_type VARCHAR(30) NOT NULL,
    firmware_version VARCHAR(30) NOT NULL,
    file_name VARCHAR(100),
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO firmware_updates (device_type, firmware_version, file_name) VALUES ('Smart Bulb', 'v1.1', 'uploads/smartbulb_v1.1.bin');
INSERT INTO firmware_updates (device_type, firmware_version, file_name) VALUES ('Thermostat', 'v2.0', 'uploads/thermostat_v2.0.bin');
INSERT INTO firmware_updates (device_type, firmware_version, file_name) VALUES ('Security Camera', 'v1.5', 'uploads/camera_v1.5.bin');
INSERT INTO firmware_updates (device_type, firmware_version, file_name) VALUES ('Smart Plug', 'v1.2', 'uploads/smartplug_v1.2.bin');
INSERT INTO firmware_updates (device_type, firmware_version, file_name) VALUES ('Door Lock', 'v1.8', 'uploads/doorlock_v1.8.bin');
INSERT INTO firmware_updates (device_type, firmware_version, file_name) VALUES ('Smoke Detector', 'v1.4', 'uploads/smokedetector_v1.4.bin');
INSERT INTO firmware_updates (device_type, firmware_version, file_name) VALUES ('Thermostat', 'v2.1', 'uploads/thermostat_v2.1.bin');
INSERT INTO firmware_updates (device_type, firmware_version, file_name) VALUES ('Smart Bulb', 'v1.2', 'uploads/smartbulb_v1.2.bin');
INSERT INTO firmware_updates (device_type, firmware_version, file_name) VALUES ('Security Camera', 'v1.6', 'uploads/camera_v1.6.bin');
INSERT INTO firmware_updates (device_type, firmware_version, file_name) VALUES ('Smart Plug', 'v1.3', 'uploads/smartplug_v1.3.bin');
