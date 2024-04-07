CREATE TABLE IF NOT EXISTS bmi_records (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height FLOAT NOT NULL,
    weight FLOAT NOT NULL,
    bmi_result FLOAT NOT NULL,
    advice TEXT NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO bmi_records (height, weight, bmi_result, advice, reg_date) VALUES (1.75, 68.5, 22.4, 'Normal weight: Keep up the good work for your health.', NOW());
INSERT INTO bmi_records (height, weight, bmi_result, advice, reg_date) VALUES (1.60, 75, 29.3, 'Overweight: Consider a healthier diet and more physical activity.', NOW());
INSERT INTO bmi_records (height, weight, bmi_result, advice, reg_date) VALUES (1.85, 80, 23.4, 'Normal weight: Keep up the good work for your health.', NOW());
INSERT INTO bmi_records (height, weight, bmi_result, advice, reg_date) VALUES (1.70, 60, 20.8, 'Normal weight: Keep up the good work for your health.', NOW());
INSERT INTO bmi_records (height, weight, bmi_result, advice, reg_date) VALUES (1.90, 95, 26.3, 'Overweight: Consider a healthier diet and more physical activity.', NOW());
INSERT INTO bmi_records (height, weight, bmi_result, advice, reg_date) VALUES (1.65, 55, 20.2, 'Normal weight: Keep up the good work for your health.', NOW());
INSERT INTO bmi_records (height, weight, bmi_result, advice, reg_date) VALUES (2.00, 100, 25.0, 'Overweight: Consider a healthier diet and more physical activity.', NOW());
INSERT INTO bmi_records (height, weight, bmi_result, advice, reg_date) VALUES (1.80, 70, 21.6, 'Normal weight: Keep up the good work for your health.', NOW());
INSERT INTO bmi_records (height, weight, bmi_result, advice, reg_date) VALUES (1.55, 45, 18.7, 'Underweight: It\'s recommended to gain weight for better health.', NOW());
INSERT INTO bmi_records (height, weight, bmi_result, advice, reg_date) VALUES (1.75, 85, 27.8, 'Overweight: Consider a healthier diet and more physical activity.', NOW());