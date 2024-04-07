CREATE TABLE bmi_records (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height DECIMAL(5,2),
    weight DECIMAL(5,2),
    bmi DECIMAL(5,2),
    advice VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO bmi_records (height, weight, bmi, advice) VALUES
(65.5, 150.2, 24.80, 'Normal weight - Maintain your current diet and exercise.'),
(70.2, 160.7, 23.02, 'Normal weight - Maintain your current diet and exercise.'),
(63.8, 140.3, 24.46, 'Normal weight - Maintain your current diet and exercise.'),
(72.1, 175.6, 23.77, 'Normal weight - Maintain your current diet and exercise.'),
(68.5, 165.3, 24.75, 'Normal weight - Maintain your current diet and exercise.'),
(71.0, 180.1, 25.14, 'Overweight - Exercise more, consider diet adjustment.'),
(66.2, 155.5, 25.10, 'Overweight - Exercise more, consider diet adjustment.'),
(69.8, 170.2, 24.86, 'Normal weight - Maintain your current diet and exercise.'),
(67.3, 160.8, 25.08, 'Overweight - Exercise more, consider diet adjustment.'),
(70.5, 175.6, 25.01, 'Overweight - Exercise more, consider diet adjustment.');