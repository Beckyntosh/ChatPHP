CREATE TABLE calorie_intakes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    age INT(3) NOT NULL,
    gender VARCHAR(20) NOT NULL,
    weight FLOAT NOT NULL,
    height INT(4) NOT NULL,
    activity_level VARCHAR(50) NOT NULL,
    recommended_calories INT(6),
    reg_date TIMESTAMP
);

INSERT INTO calorie_intakes (age, gender, weight, height, activity_level, recommended_calories) VALUES
(25, 'male', 70.5, 175, 'sedentary', 2100),
(30, 'female', 60.8, 163, 'lightly active', 1800),
(40, 'male', 80.2, 180, 'moderately active', 2500),
(35, 'male', 75.3, 170, 'very active', 2800),
(45, 'female', 65.9, 165, 'extra active', 2000),
(28, 'male', 72.1, 178, 'moderately active', 2400),
(32, 'female', 58.4, 160, 'lightly active', 1900),
(50, 'male', 85.6, 185, 'very active', 3000),
(55, 'female', 70.2, 168, 'sedentary', 1700),
(42, 'female', 63.7, 162, 'extra active', 2100);
