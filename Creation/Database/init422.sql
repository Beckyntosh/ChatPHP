CREATE TABLE IF NOT EXISTS bmi_records (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  height FLOAT NOT NULL,
  weight FLOAT NOT NULL,
  bmi_result FLOAT NOT NULL,
  recommendation VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (70, 150, 21.53, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (65, 120, 19.98, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (72, 180, 24.41, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (68, 130, 19.74, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (75, 200, 25.07, 'Overweight - Consider a diet and exercise.');
INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (62, 110, 20.08, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (69, 160, 23.62, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (71, 170, 23.69, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (67, 140, 21.94, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi_result, recommendation) VALUES (73, 190, 25.12, 'Overweight - Consider a diet and exercise!');
