CREATE TABLE bmi_records (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height DECIMAL(5,2),
    weight DECIMAL(5,2),
    bmi DECIMAL(5,2),
    advice VARCHAR(256),
    reg_date TIMESTAMP
);

INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (65.5, 150, 24.86, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (68.2, 165, 25.02, 'Overweight - Exercise more and watch your diet.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (61.8, 125, 22.98, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (70.1, 180, 25.76, 'Overweight - Exercise more and watch your diet.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (63.7, 135, 23.21, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (72.4, 195, 26.18, 'Overweight - Exercise more and watch your diet.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (59.3, 110, 22.14, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (74.7, 210, 26.45, 'Overweight - Exercise more and watch your diet!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (66.9, 155, 24.19, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (69.6, 175, 25.63, 'Overweight - Exercise more and watch your diet!');