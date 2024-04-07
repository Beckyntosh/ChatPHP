CREATE TABLE IF NOT EXISTS BMIRecords (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height FLOAT NOT NULL,
    weight FLOAT NOT NULL,
    bmi FLOAT,
    advice TEXT,
    reg_date TIMESTAMP
);

INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (65, 150, 24.96, 'Normal weight - Keep up the good work!');
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (70, 160, 22.96, 'Normal weight - Keep up the good work!');
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (62, 130, 23.8, 'Normal weight - Keep up the good work!');
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (69, 180, 26.6, 'Overweight - Exercise more and watch your diet.');
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (72, 200, 27.12, 'Overweight - Exercise more and watch your diet.');
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (57, 110, 29.99, 'Obesity - Seek medical advice for a suitable diet and exercise plan.');
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (71, 185, 25.79, 'Overweight - Exercise more and watch your diet.');
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (64, 140, 24.04, 'Normal weight - Keep up the good work!');
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (68, 170, 25.81, 'Overweight - Exercise more and watch your diet.');
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (60, 120, 23.44, 'Normal weight - Keep up the good work!');
