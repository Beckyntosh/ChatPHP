CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
appointment_type VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO Patients (fullname, appointment_type) VALUES ('Jane Doe', 'Dental Check-Up');
INSERT INTO Patients (fullname, appointment_type) VALUES ('John Smith', 'Eye Exam');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Emily Johnson', 'Dermatology Appointment');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Michael Brown', 'Physical Therapy Session');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Sarah Wilson', 'Psychology Consultation');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Adam Garcia', 'Nutrition Counseling');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Olivia Martinez', 'Chiropractic Adjustment');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Daniel Lee', 'Cardiology Consult');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Sophia Rodriguez', 'Prenatal Check-Up');
INSERT INTO Patients (fullname, appointment_type) VALUES ('William White', 'Orthopedic Evaluation');
