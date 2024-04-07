CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullName VARCHAR(30) NOT NULL,
appointmentType VARCHAR(30) NOT NULL,
appointmentDate DATETIME NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert Values
INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES ('Jane Doe', 'Dental Check-up', '2022-04-08 10:00:00');
INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES ('John Smith', 'Eye Exam', '2022-04-15 11:30:00');
INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES ('Emma Johnson', 'Physical Therapy', '2022-04-20 14:45:00');
INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES ('Michael Brown', 'Dental Cleaning', '2022-04-25 09:15:00');
INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES ('Amy Davis', 'Orthodontic Consultation', '2022-04-30 16:00:00');
INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES ('Robert Wilson', 'Dermatology Appointment', '2022-05-05 13:30:00');
INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES ('Olivia Taylor', 'Cardiology Check-up', '2022-05-10 10:45:00');
INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES ('William Martinez', 'Allergy Testing', '2022-05-15 11:30:00');
INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES ('Sophia Anderson', 'ENT Consultation', '2022-05-20 14:00:00');
INSERT INTO Patients (fullName, appointmentType, appointmentDate) VALUES ('Ethan Garcia', 'Chiropractic Adjustment', '2022-05-25 08:30:00');