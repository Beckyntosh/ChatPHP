CREATE TABLE IF NOT EXISTS CalorieIntake (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
age INT(3) NOT NULL,
gender VARCHAR(10) NOT NULL,
weight FLOAT NOT NULL,
height FLOAT NOT NULL,
activity VARCHAR(20) NOT NULL,
calories FLOAT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (25, 'male', 70.5, 175.2, 'sedentary', 2200);
INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (30, 'female', 60.3, 160.8, 'lightly', 1800);
INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (40, 'male', 80.7, 180.1, 'moderately', 2600);
INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (35, 'female', 65.8, 165.5, 'very', 2200);
INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (45, 'male', 85.2, 185.6, 'extra', 3000);
INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (28, 'female', 55.9, 158.4, 'sedentary', 1900);
INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (50, 'male', 90.5, 190.7, 'lightly', 2200);
INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (33, 'female', 63.2, 162.9, 'moderately', 2400);
INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (55, 'male', 95.9, 195.3, 'very', 2800);
INSERT INTO CalorieIntake (age, gender, weight, height, activity, calories) VALUES (38, 'female', 67.4, 168.2, 'extra', 3200);
