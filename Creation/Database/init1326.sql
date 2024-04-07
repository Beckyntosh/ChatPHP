CREATE TABLE IF NOT EXISTS patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
appointment_date DATE NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
patient_id INT(6) UNSIGNED,
appointment_type VARCHAR(50),
FOREIGN KEY (patient_id) REFERENCES patients(id)
);

INSERT INTO patients (firstname, lastname, appointment_date) VALUES 
('Jane', 'Doe', '2022-01-10'),
('John', 'Smith', '2022-02-15'),
('Alice', 'Johnson', '2022-03-20'),
('Michael', 'Brown', '2022-04-25'),
('Emily', 'Williams', '2022-05-30'),
('David', 'Jones', '2022-06-05'),
('Sarah', 'Miller', '2022-07-10'),
('Daniel', 'Davis', '2022-08-15'),
('Olivia', 'Martinez', '2022-09-20'),
('James', 'Garcia', '2022-10-25');

INSERT INTO appointments (patient_id, appointment_type) VALUES 
(1, 'Dental Check-up'),
(2, 'Eye Exam'),
(3, 'Dermatology Consultation'),
(4, 'Physical Therapy Session'),
(5, 'Nutrition Counseling'),
(6, 'Psychological Evaluation'),
(7, 'Orthopedic Assessment'),
(8, 'Cardiology Consultation'),
(9, 'Prenatal Check-up'),
(10, 'Pediatric Vaccination');