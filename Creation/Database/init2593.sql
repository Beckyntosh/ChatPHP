CREATE TABLE bmi_records (
  id INT AUTO_INCREMENT PRIMARY KEY,
  height FLOAT NOT NULL,
  weight FLOAT NOT NULL,
  bmi FLOAT NOT NULL,
  advice TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (160, 55, 21.48, 'Normal: Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (175, 65, 21.22, 'Normal: Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (168, 70, 24.8, 'Overweight: Consider exercising and eating healthy.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (180, 80, 24.69, 'Overweight: Consider exercising and eating healthy.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (165, 45, 16.53, 'Underweight: Eat more, include protein and carbs in your diet.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (172, 95, 32.12, 'Obese: Seek professional health advice.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (178, 75, 23.67, 'Normal: Keep up the good work!');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (163, 85, 31.94, 'Obese: Seek professional health advice.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (170, 50, 17.3, 'Underweight: Eat more, include protein and carbs in your diet.');
INSERT INTO bmi_records (height, weight, bmi, advice) VALUES (176, 60, 19.38, 'Normal: Keep up the good work!');
