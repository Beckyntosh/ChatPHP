CREATE TABLE IF NOT EXISTS bmi_results (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height DECIMAL(5,2),
    weight DECIMAL(5,2),
    bmi DECIMAL(5,2),
    advice VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (170, 70, 24.22, "Normal - Keep it up!");
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (180, 90, 27.78, "Overweight - Exercise more!");
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (160, 50, 19.53, "Normal - Keep it up!");
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (175, 65, 21.22, "Normal - Keep it up!");
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (165, 80, 29.38, "Overweight - Exercise more!");
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (155, 45, 18.73, "Underweight - Eat more, exercise");
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (170, 100, 34.60, "Obese - Seek medical attention");
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (185, 75, 21.91, "Normal - Keep it up!");
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (162, 55, 20.98, "Normal - Keep it up!");
INSERT INTO bmi_results (height, weight, bmi, advice) VALUES (168, 68, 24.04, "Normal - Keep it up!");
