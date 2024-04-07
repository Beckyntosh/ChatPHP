CREATE TABLE IF NOT EXISTS bmi_records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    height FLOAT NOT NULL,
    weight FLOAT NOT NULL,
    bmi FLOAT NOT NULL,
    advice VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (160, 60, 23.44, "Normal weight");
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (170, 75, 25.95, "Overweight");
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (180, 85, 26.23, "Overweight");
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (155, 50, 20.81, "Normal weight");
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (165, 70, 25.71, "Overweight");
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (175, 80, 26.12, "Overweight");
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (150, 45, 20.0, "Normal weight");
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (160, 55, 21.48, "Normal weight");
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (170, 65, 22.49, "Normal weight");
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (180, 90, 27.78, "Overweight");