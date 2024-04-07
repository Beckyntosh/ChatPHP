CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
appointment_type VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Patients (name, appointment_type) VALUES ('Jane Doe', 'Dental Check-up');
INSERT INTO Patients (name, appointment_type) VALUES ('John Smith', 'Eye Exam');
INSERT INTO Patients (name, appointment_type) VALUES ('Sarah Johnson', 'Physical Therapy');
INSERT INTO Patients (name, appointment_type) VALUES ('Michael Brown', 'Dermatology Appointment');
INSERT INTO Patients (name, appointment_type) VALUES ('Emily Wilson', 'Dental Cleaning');
INSERT INTO Patients (name, appointment_type) VALUES ('Kevin Davis', 'Cardiology Consultation');
INSERT INTO Patients (name, appointment_type) VALUES ('Laura Martinez', 'Flu Shot');
INSERT INTO Patients (name, appointment_type) VALUES ('Daniel Lee', 'Orthopedic Evaluation');
INSERT INTO Patients (name, appointment_type) VALUES ('Amanda Taylor', 'Nutrition Counseling');
INSERT INTO Patients (name, appointment_type) VALUES ('Marcos Perez', 'Allergy Testing');
