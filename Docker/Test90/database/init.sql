CREATE TABLE IF NOT EXISTS bmi_records (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    height FLOAT NOT NULL,
    weight FLOAT NOT NULL,
    bmi FLOAT NOT NULL,
    advice VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (0.5, 3, 120, 'Your pet is overweight. Time for more zoomies!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (0.3, 2, 222, 'Your pet might be underweight. More snackies!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (0.6, 5, 83.3, 'Your pet is at a healthy weight. Perfect snuggle buddy!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (0.4, 4, 100, 'Your pet is at a healthy weight. Perfect snuggle buddy!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (0.6, 3, 83.3, 'Your pet is at a healthy weight. Perfect snuggle buddy!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (0.5, 4, 80, 'Your pet is at a healthy weight. Perfect snuggle buddy!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (0.7, 5, 102, 'Your pet is at a healthy weight. Perfect snuggle buddy!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (0.4, 2, 125, 'Your pet is overweight. Time for more zoomies!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (0.3, 3, 100, 'Your pet is at a healthy weight. Perfect snuggle buddy!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (0.6, 4, 111.11, 'Your pet is at a healthy weight. Perfect snuggle buddy!');
