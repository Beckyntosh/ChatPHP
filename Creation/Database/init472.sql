CREATE TABLE IF NOT EXISTS WaterIntakeRecords (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
weight FLOAT NOT NULL,
activity_level VARCHAR(30) NOT NULL,
suggested_intake FLOAT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake) VALUES (70.5, 'low', 2115);
INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake) VALUES (65.2, 'medium', 2282);
INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake) VALUES (80.0, 'high', 3200);
INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake) VALUES (75.7, 'low', 2271);
INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake) VALUES (82.3, 'medium', 2870);
INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake) VALUES (70.0, 'high', 2800);
INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake) VALUES (68.9, 'low', 2067);
INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake) VALUES (77.4, 'medium', 2709);
INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake) VALUES (83.6, 'high', 3344);
INSERT INTO WaterIntakeRecords (weight, activity_level, suggested_intake) VALUES (71.2, 'low', 2136);
