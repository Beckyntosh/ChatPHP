CREATE TABLE running_pace_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    distance FLOAT,
    time VARCHAR(8),
    pace VARCHAR(5)
);

INSERT INTO running_pace_calculations (distance, time, pace) VALUES (5, '00:25:00', '05:00');
INSERT INTO running_pace_calculations (distance, time, pace) VALUES (10, '01:00:00', '06:00');
INSERT INTO running_pace_calculations (distance, time, pace) VALUES (8, '00:45:00', '05:37');
INSERT INTO running_pace_calculations (distance, time, pace) VALUES (12, '01:10:00', '05:50');
INSERT INTO running_pace_calculations (distance, time, pace) VALUES (4, '00:20:00', '05:00');
INSERT INTO running_pace_calculations (distance, time, pace) VALUES (6, '00:30:00', '05:00');
INSERT INTO running_pace_calculations (distance, time, pace) VALUES (15, '01:20:00', '05:20');
INSERT INTO running_pace_calculations (distance, time, pace) VALUES (20, '01:40:00', '05:00');
INSERT INTO running_pace_calculations (distance, time, pace) VALUES (3, '00:15:00', '05:00');
INSERT INTO running_pace_calculations (distance, time, pace) VALUES (7, '00:35:00', '05:00');
