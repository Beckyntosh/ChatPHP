CREATE TABLE IF NOT EXISTS TimezoneConversions (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fromTimezone VARCHAR(50) NOT NULL,
toTimezone VARCHAR(50) NOT NULL,
convertedTime VARCHAR(50) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO TimezoneConversions (fromTimezone, toTimezone, convertedTime, reg_date) VALUES 
('America/New_York', 'Europe/London', '01:00 AM', NOW()),
('Europe/London', 'America/New_York', '06:00 PM', NOW()),
('Asia/Tokyo', 'America/Los_Angeles', '02:00 PM', NOW()),
('Australia/Sydney', 'Europe/Paris', '02:00 AM', NOW()),
('Africa/Cairo', 'Asia/Dubai', '07:00 PM', NOW()),
('Pacific/Honolulu', 'America/Chicago', '10:00 AM', NOW()),
('Asia/Kolkata', 'Europe/Berlin', '12:30 AM', NOW()),
('America/Sao_Paulo', 'America/Denver', '04:00 PM', NOW()),
('Europe/Moscow', 'Japan', '07:30 AM', NOW()),
('America/Toronto', 'Australia/Perth', '11:00 PM', NOW());
