CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_type VARCHAR(255) NOT NULL
);

INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Jane Doe', '2023-04-15', 'Dental Check-up');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('John Smith', '2023-04-18', 'Eye Exam');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Sarah Wilson', '2023-04-20', 'Dermatology Check');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Michael Johnson', '2023-04-25', 'Dental Cleaning');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Emily Brown', '2023-04-28', 'Physical Therapy');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('David Lee', '2023-05-05', 'Allergy Testing');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Lisa Anderson', '2023-05-08', 'Psychology Session');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Kevin Garcia', '2023-05-12', 'Cardiology Consultation');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Jessica Clark', '2023-05-15', 'Orthopedic Evaluation');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Ryan Perez', '2023-05-20', 'Nutrition Counseling');
