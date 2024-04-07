CREATE TABLE IF NOT EXISTS BMIRecords (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
height FLOAT NOT NULL,
weight FLOAT NOT NULL,
bmi FLOAT NOT NULL,
advice VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (1.75, 60, 19.59, "Normal weight - Keep up the good work!");
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (1.80, 70, 21.60, "Normal weight - Keep up the good work!");
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (1.65, 55, 20.20, "Normal weight - Keep up the good work!");
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (1.70, 80, 27.68, "Overweight - A healthy diet and more exercise are advised.");
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (1.60, 50, 19.53, "Normal weight - Keep up the good work!");
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (1.85, 90, 26.30, "Overweight - A healthy diet and more exercise are advised.");
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (1.77, 65, 20.76, "Normal weight - Keep up the good work!");
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (1.72, 75, 25.35, "Overweight - A healthy diet and more exercise are advised.");
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (1.68, 70, 24.80, "Overweight - A healthy diet and more exercise are advised.");
INSERT INTO BMIRecords (height, weight, bmi, advice) VALUES (1.78, 68, 21.50, "Normal weight - Keep up the good work!");
