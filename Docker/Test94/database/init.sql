CREATE TABLE bmi_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    height INT,
    weight INT,
    bmi FLOAT,
    health_status VARCHAR(255)
);

INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES (170, 60, '20.8', 'Normal weight');
INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES (160, 55, '21.5', 'Normal weight');
INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES (180, 70, '21.6', 'Normal weight');
INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES (175, 80, '26.1', 'Overweight');
INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES (165, 45, '16.5', 'Underweight');
INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES (172, 75, '25.4', 'Overweight');
INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES (168, 90, '31.9', 'Obesity');
INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES (176, 65, '21.0', 'Normal weight');
INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES (158, 50, '20.0', 'Normal weight');
INSERT INTO bmi_records (height, weight, bmi, health_status) VALUES (182, 85, '25.7', 'Overweight');
