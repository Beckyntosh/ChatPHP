CREATE TABLE IF NOT EXISTS BMIData (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  height FLOAT NOT NULL,
  weight FLOAT NOT NULL,
  bmi FLOAT NOT NULL,
  health VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO BMIData (height, weight, bmi, health) VALUES (65, 150, 24.96, 'Normal weight');
INSERT INTO BMIData (height, weight, bmi, health) VALUES (70, 180, 25.82, 'Overweight');
INSERT INTO BMIData (height, weight, bmi, health) VALUES (62, 120, 22.01, 'Normal weight');
INSERT INTO BMIData (height, weight, bmi, health) VALUES (68, 200, 30.40, 'Obesity');
INSERT INTO BMIData (height, weight, bmi, health) VALUES (66, 140, 22.63, 'Normal weight');
INSERT INTO BMIData (height, weight, bmi, health) VALUES (72, 190, 25.74, 'Overweight');
INSERT INTO BMIData (height, weight, bmi, health) VALUES (64, 130, 22.28, 'Normal weight');
INSERT INTO BMIData (height, weight, bmi, health) VALUES (69, 160, 23.64, 'Normal weight');
INSERT INTO BMIData (height, weight, bmi, health) VALUES (67, 170, 26.61, 'Overweight');
INSERT INTO BMIData (height, weight, bmi, health) VALUES (71, 210, 29.25, 'Obesity');
