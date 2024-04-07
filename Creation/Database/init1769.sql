CREATE TABLE IF NOT EXISTS firmware_updates (
    id INT AUTO_INCREMENT PRIMARY KEY,
    device_type VARCHAR(255) NOT NULL,
    firmware_version VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Insert at least 10 values into the firmware_updates table
INSERT INTO firmware_updates (device_type, firmware_version, file_path) VALUES
('Smart Thermostat', '1.0', '/uploads/firmware1.zip'),
('Smart Thermostat', '1.1', '/uploads/firmware2.bin'),
('Smart Thermostat', '1.2', '/uploads/firmware3.tar'),
('Smart Thermostat', '1.3', '/uploads/firmware4.zip'),
('Smart Thermostat', '1.4', '/uploads/firmware5.bin'),
('Smart Thermostat', '1.5', '/uploads/firmware6.zip'),
('Smart Thermostat', '1.6', '/uploads/firmware7.tar'),
('Smart Thermostat', '1.7', '/uploads/firmware8.bin'),
('Smart Thermostat', '1.8', '/uploads/firmware9.zip'),
('Smart Thermostat', '1.9', '/uploads/firmware10.tar');
