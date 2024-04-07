CREATE TABLE IF NOT EXISTS calorie_intake (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
age INT(3) NOT NULL,
gender VARCHAR(10) NOT NULL,
weight FLOAT NOT NULL,
height FLOAT NOT NULL,
activity_level VARCHAR(30) NOT NULL,
calorie_intake FLOAT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake) VALUES (25, 'male', 75.5, 180.3, 'sedentary', 2300);
INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake) VALUES (30, 'female', 60.2, 165.8, 'lightly active', 1900);
INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake) VALUES (40, 'male', 85.7, 172.6, 'moderately active', 2800);
INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake) VALUES (35, 'female', 70.1, 160.0, 'very active', 2500);
INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake) VALUES (28, 'male', 78.3, 175.2, 'extra active', 3200);
INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake) VALUES (45, 'female', 65.4, 163.5, 'moderately active', 2100);
INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake) VALUES (32, 'male', 80.9, 178.7, 'very active', 2900);
INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake) VALUES (50, 'female', 68.2, 157.4, 'sedentary', 1800);
INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake) VALUES (33, 'male', 76.5, 179.9, 'lightly active', 2400);
INSERT INTO calorie_intake (age, gender, weight, height, activity_level, calorie_intake) VALUES (55, 'female', 67.8, 154.3, 'extra active', 3300);
