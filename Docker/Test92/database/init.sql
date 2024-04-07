CREATE TABLE IF NOT EXISTS BMIRecords (
    id INT AUTO_INCREMENT PRIMARY KEY,
    height DECIMAL,
    weight DECIMAL,
    bmi DECIMAL,
    health VARCHAR(255)
);

INSERT INTO BMIRecords (height, weight, bmi, health) VALUES (170, 60, 20.76, "Normal weight - Keep it up!");
INSERT INTO BMIRecords (height, weight, bmi, health) VALUES (160, 45, 17.58, "Underweight - Eat more nutritious food.");
INSERT INTO BMIRecords (height, weight, bmi, health) VALUES (180, 75, 23.15, "Normal weight - Keep it up!");
INSERT INTO BMIRecords (height, weight, bmi, health) VALUES (155, 70, 29.16, "Overweight - Exercise more frequently.");
INSERT INTO BMIRecords (height, weight, bmi, health) VALUES (165, 85, 31.22, "Obesity - Seek a doctor's advice.");
INSERT INTO BMIRecords (height, weight, bmi, health) VALUES (175, 55, 17.96, "Normal weight - Keep it up!");
INSERT INTO BMIRecords (height, weight, bmi, health) VALUES (160, 50, 19.53, "Normal weight - Keep it up!");
INSERT INTO BMIRecords (height, weight, bmi, health) VALUES (170, 90, 31.14, "Obesity - Seek a doctor's advice.");
INSERT INTO BMIRecords (height, weight, bmi, health) VALUES (180, 70, 21.60, "Normal weight - Keep it up!");
INSERT INTO BMIRecords (height, weight, bmi, health) VALUES (165, 75, 27.55, "Overweight - Exercise more frequently.");
