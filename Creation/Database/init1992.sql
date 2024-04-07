CREATE TABLE IF NOT EXISTS bmi_results (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
height VARCHAR(30) NOT NULL,
weight VARCHAR(30) NOT NULL,
bmi FLOAT NOT NULL,
advice VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO bmi_results (height, weight, bmi, advice) VALUES ('175', '70', '22.86', 'Normal: Keep up the good work! Balanced diet and regular exercise are key.');
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES ('160', '50', '19.53', 'Normal: Keep up the good work! Balanced diet and regular exercise are key.');
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES ('185', '90', '26.3', 'Overweight: Exercise regularly and watch your calorie intake.');
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES ('170', '60', '20.76', 'Normal: Keep up the good work! Balanced diet and regular exercise are key.');
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES ('165', '55', '20.2', 'Normal: Keep up the good work! Balanced diet and regular exercise are key.');
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES ('180', '80', '24.69', 'Overweight: Exercise regularly and watch your calorie intake.');
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES ('155', '45', '18.73', 'Underweight: Eat more frequently and choose nutrient-rich foods.');
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES ('190', '95', '26.32', 'Overweight: Exercise regularly and watch your calorie intake.');
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES ('150', '40', '17.78', 'Underweight: Eat more frequently and choose nutrient-rich foods.');
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES ('200', '100', '25', 'Overweight: Exercise regularly and watch your calorie intake.');
