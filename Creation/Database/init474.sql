CREATE TABLE daily_water_intake (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    weight DECIMAL(5,2) NOT NULL,
    activity_level VARCHAR(30) NOT NULL,
    water_intake DECIMAL(5,2) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES (60.5, 'Low', 1.99);
INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES (75.3, 'High', 2.52);
INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES (65.8, 'Medium', 2.16);
INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES (70.2, 'Low', 2.32);
INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES (55.6, 'High', 1.82);
INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES (80.0, 'Medium', 2.45);
INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES (68.9, 'Low', 2.26);
INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES (73.4, 'High', 2.42);
INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES (62.7, 'Medium', 2.06);
INSERT INTO daily_water_intake (weight, activity_level, water_intake) VALUES (77.1, 'Low', 2.53);
