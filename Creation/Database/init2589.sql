CREATE TABLE IF NOT EXISTS bmi_records (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  height DOUBLE NOT NULL,
  weight DOUBLE NOT NULL,
  bmi DOUBLE NOT NULL,
  advice TEXT,
  calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (170, 70, 24.2, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (160, 55, 21.5, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (180, 80, 24.7, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (165, 68, 25.0, 'Overweight - A healthier diet and exercise might be beneficial.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (175, 90, 29.4, 'Overweight - A healthier diet and exercise might be beneficial.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (155, 45, 18.8, 'Underweight - Good nutrition is important. Consider a diet.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (170, 75, 25.9, 'Overweight - A healthier diet and exercise might be beneficial.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (160, 60, 23.4, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (165, 70, 25.7, 'Overweight - A healthier diet and exercise might be beneficial.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (180, 85, 26.2, 'Overweight - A healthier diet and exercise might be beneficial');
