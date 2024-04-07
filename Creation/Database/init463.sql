CREATE TABLE conversions (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fromTimeZone VARCHAR(50) NOT NULL,
    toTimeZone VARCHAR(50) NOT NULL,
    originalTime VARCHAR(20) NOT NULL,
    convertedTime DATETIME NOT NULL
);

INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('America/New_York', 'Europe/London', '11:00 AM', '2023-10-20 16:00:00');
INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('Asia/Tokyo', 'Australia/Sydney', '4:30 PM', '2023-11-05 18:30:00');
INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('Europe/Madrid', 'America/Los_Angeles', '7:45 AM', '2023-09-15 00:45:00');
INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('America/Chicago', 'Asia/Dubai', '2:15 PM', '2023-12-08 23:15:00');
INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('Australia/Melbourne', 'Africa/Johannesburg', '8:30 AM', '2023-07-29 00:30:00');
INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('Asia/Kolkata', 'Europe/Paris', '6:00 PM', '2023-02-13 13:30:00');
INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('Pacific/Auckland', 'America/Toronto', '1:45 PM', '2023-06-10 20:45:00');
INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('Europe/Berlin', 'Asia/Shanghai', '10:10 AM', '2023-04-18 16:10:00');
INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('America/Denver', 'Africa/Cairo', '3:30 PM', '2023-08-27 23:30:00');
INSERT INTO conversions (fromTimeZone, toTimeZone, originalTime, convertedTime) VALUES ('Asia/Singapore', 'America/Sao_Paulo', '9:20 AM', '2023-11-29 21:20:00');