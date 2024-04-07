CREATE TABLE IF NOT EXISTS bmiRecords (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
height FLOAT NOT NULL,
weight FLOAT NOT NULL,
bmi FLOAT NOT NULL,
advice VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES (165, 60, 22.04, 'Normal weight: Keep up the good work');
INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES (180, 75, 23.15, 'Normal weight: Keep up the good work');
INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES (155, 50, 20.81, 'Underweight: Consider gaining weight');
INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES (170, 80, 27.68, 'Overweight: Consider losing weight');
INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES (175, 90, 29.39, 'Obesity: Seek professional health advice');
INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES (160, 70, 27.34, 'Overweight: Consider losing weight');
INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES (185, 95, 27.76, 'Overweight: Consider losing weight');
INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES (150, 45, 20, 'Underweight: Consider gaining weight');
INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES (162, 55, 20.96, 'Normal weight: Keep up the good work');
INSERT INTO bmiRecords (height, weight, bmi, advice) VALUES (168, 72, 25.51, 'Overweight: Consider losing weight');
