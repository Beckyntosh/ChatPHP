CREATE TABLE bmiCalculations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  height FLOAT NOT NULL,
  weight FLOAT NOT NULL,
  bmi FLOAT NOT NULL,
  advice VARCHAR(255),
  reg_date TIMESTAMP
);

INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (1.75, 70.5, 23.02, 'Normal weight');
INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (1.65, 55.5, 20.41, 'Normal weight');
INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (1.80, 85.0, 26.23, 'Overweight');
INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (1.70, 45.5, 15.73, 'Underweight');
INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (1.60, 70.0, 27.34, 'Overweight');
INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (1.85, 95.5, 27.89, 'Overweight');
INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (1.55, 65.5, 27.30, 'Overweight');
INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (1.90, 80.5, 22.25, 'Normal weight');
INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (1.62, 52.0, 20.00, 'Normal weight');
INSERT INTO bmiCalculations (height, weight, bmi, advice) VALUES (1.88, 100.0, 28.29, 'Obesity');
