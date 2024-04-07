CREATE TABLE IF NOT EXISTS running_logs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    distance DOUBLE NOT NULL,
    time TIME NOT NULL,
    pace VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO running_logs (distance, time, pace) VALUES (10.5, '01:30:00', '08:34');
INSERT INTO running_logs (distance, time, pace) VALUES (5.0, '00:25:00', '05:00');
INSERT INTO running_logs (distance, time, pace) VALUES (21.1, '01:45:00', '05:00');
INSERT INTO running_logs (distance, time, pace) VALUES (42.2, '03:30:00', '04:59');
INSERT INTO running_logs (distance, time, pace) VALUES (8.0, '00:40:00', '05:00');
INSERT INTO running_logs (distance, time, pace) VALUES (15.0, '01:15:00', '05:00');
INSERT INTO running_logs (distance, time, pace) VALUES (3.0, '00:15:00', '05:00');
INSERT INTO running_logs (distance, time, pace) VALUES (6.0, '00:30:00', '05:00');
INSERT INTO running_logs (distance, time, pace) VALUES (12.5, '01:05:00', '05:12');
INSERT INTO running_logs (distance, time, pace) VALUES (26.2, '02:15:00', '05:09');
