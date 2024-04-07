CREATE TABLE bmi_records (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    weight VARCHAR(30) NOT NULL,
    height VARCHAR(30) NOT NULL,
    bmi_result FLOAT(5,2) NOT NULL,
    advice TEXT,
    reg_date TIMESTAMP
);

INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES ('70', '1.75', '22.86', 'Healthy Weight - Keep up the good work!');
INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES ('60', '1.65', '22.04', 'Healthy Weight - Keep up the good work!');
INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES ('80', '1.80', '24.69', 'Overweight - Exercise regularly, monitor your diet.');
INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES ('55', '1.60', '21.48', 'Healthy Weight - Keep up the good work!');
INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES ('90', '1.85', '26.30', 'Overweight - Exercise regularly, monitor your diet.');
INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES ('75', '1.70', '25.95', 'Overweight - Exercise regularly, monitor your diet.');
INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES ('65', '1.68', '23.03', 'Healthy Weight - Keep up the good work!');
INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES ('70', '1.75', '22.86', 'Healthy Weight - Keep up the good work!');
INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES ('85', '1.78', '26.86', 'Overweight - Exercise regularly, monitor your diet!');
INSERT INTO bmi_records (weight, height, bmi_result, advice) VALUES ('95', '1.90', '26.32', 'Overweight - Exercise regularly, monitor your diet!');
