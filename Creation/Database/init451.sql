CREATE TABLE IF NOT EXISTS running_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pace DECIMAL(5,2) NOT NULL,
    distance DECIMAL(5,2) NOT NULL,
    time VARCHAR(50) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO running_records (pace, distance, time) VALUES (4.5, 10, '00:45:00');
INSERT INTO running_records (pace, distance, time) VALUES (5.0, 5, '00:25:00');
INSERT INTO running_records (pace, distance, time) VALUES (6.2, 21, '02:10:00');
INSERT INTO running_records (pace, distance, time) VALUES (7.2, 42.2, '05:05:00');
INSERT INTO running_records (pace, distance, time) VALUES (6.0, 10, '01:00:00');
INSERT INTO running_records (pace, distance, time) VALUES (5.5, 15, '01:22:30');
INSERT INTO running_records (pace, distance, time) VALUES (4.8, 12.5, '01:00:00');
INSERT INTO running_records (pace, distance, time) VALUES (8.0, 2, '00:15:00');
INSERT INTO running_records (pace, distance, time) VALUES (6.5, 7, '00:45:30');
INSERT INTO running_records (pace, distance, time) VALUES (7.6, 10, '01:16:00');