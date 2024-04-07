CREATE TABLE IF NOT EXISTS Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    appointment VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO Patients (fullname, appointment) VALUES ('Jane Doe', 'Dental Check-up');

INSERT INTO Patients (fullname, appointment) VALUES ('John Smith', 'Physical Exam');
INSERT INTO Patients (fullname, appointment) VALUES ('Sarah Johnson', 'Eye Check-up');
INSERT INTO Patients (fullname, appointment) VALUES ('Michael Brown', 'Dental Cleaning');
INSERT INTO Patients (fullname, appointment) VALUES ('Emily Davis', 'Gynecologist Appointment');
INSERT INTO Patients (fullname, appointment) VALUES ('Robert Miller', 'Flu Shot');
INSERT INTO Patients (fullname, appointment) VALUES ('Amanda Wilson', 'Blood Test');
INSERT INTO Patients (fullname, appointment) VALUES ('Daniel Martinez', 'Orthopedic Consultation');
INSERT INTO Patients (fullname, appointment) VALUES ('Laura Perez', 'Allergy Test');
INSERT INTO Patients (fullname, appointment) VALUES ('Tyler Harris', 'Cardiologist Appointment');