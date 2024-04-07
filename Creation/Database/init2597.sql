CREATE TABLE bmi_records (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    height DECIMAL(5,2) NOT NULL,
    weight DECIMAL(5,2) NOT NULL,
    bmi DECIMAL(5,2) NOT NULL,
    status VARCHAR(50) NOT NULL
);

INSERT INTO bmi_records (height, weight, bmi, status) VALUES (1.75, 70, 22.9, 'Normal weight');
INSERT INTO bmi_records (height, weight, bmi, status) VALUES (1.68, 55, 19.5, 'Normal weight');
INSERT INTO bmi_records (height, weight, bmi, status) VALUES (1.80, 85, 26.2, 'Overweight');
INSERT INTO bmi_records (height, weight, bmi, status) VALUES (1.65, 50, 18.4, 'Underweight');
INSERT INTO bmi_records (height, weight, bmi, status) VALUES (1.70, 75, 25.9, 'Overweight');
INSERT INTO bmi_records (height, weight, bmi, status) VALUES (1.60, 45, 17.6, 'Underweight');
INSERT INTO bmi_records (height, weight, bmi, status) VALUES (1.85, 90, 26.3, 'Overweight');
INSERT INTO bmi_records (height, weight, bmi, status) VALUES (1.72, 60, 20.3, 'Normal weight');
INSERT INTO bmi_records (height, weight, bmi, status) VALUES (1.78, 80, 25.2, 'Overweight');
INSERT INTO bmi_records (height, weight, bmi, status) VALUES (1.62, 48, 18.3, 'Underweight');