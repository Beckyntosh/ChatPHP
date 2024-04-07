CREATE TABLE IF NOT EXISTS bmi_records (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
height DECIMAL(5,2) NOT NULL,
weight DECIMAL(5,2) NOT NULL,
bmi DECIMAL(5,2) NOT NULL,
advice TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (65.5, 130.5, 21.6, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (70.3, 160.2, 22.9, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (62.7, 115.8, 20.9, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (68.0, 175.4, 26.6, 'Overweight - Diet and exercise are recommended.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (72.1, 185.7, 25.1, 'Overweight - Diet and exercise are recommended.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (66.9, 140.9, 22.2, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (63.8, 124.6, 21.5, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (70.5, 172.3, 24.5, 'Overweight - Diet and exercise are recommended.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (64.4, 135.0, 22.9, 'Normal weight - Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (69.2, 150.8, 22.3, 'Normal weight - Keep up the good work!');
