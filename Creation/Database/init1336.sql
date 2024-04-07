CREATE TABLE Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
appointment_type VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Patients (fullname, appointment_type) VALUES ('Jane Doe', 'Dental Check-up');
INSERT INTO Patients (fullname, appointment_type) VALUES ('John Smith', 'Eye Exam');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Alice Johnson', 'X-ray');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Michael Brown', 'Physical Therapy');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Emily Wilson', 'Blood Test');
INSERT INTO Patients (fullname, appointment_type) VALUES ('David Lee', 'Consultation');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Sarah Davis', 'Vaccination');
INSERT INTO Patients (fullname, appointment_type) VALUES ('James Rodriguez', 'MRI Scan');
INSERT INTO Patients (fullname, appointment_type) VALUES ('Olivia Martinez', 'Ultrasound');
INSERT INTO Patients (fullname, appointment_type) VALUES ('William Harris', 'Chiropractic Adjustment');