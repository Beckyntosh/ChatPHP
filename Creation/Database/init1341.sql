CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
appointment_date DATE,
appointment_time TIME,
appointment_type VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES ('Jane', 'Doe', '2023-04-01', '10:00:00', 'Dental Check-up');
INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES ('John', 'Smith', '2023-04-02', '11:30:00', 'General Consultation');
INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES ('Alice', 'Johnson', '2023-04-03', '09:15:00', 'Herbal Consultation');
INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES ('Michael', 'Brown', '2023-04-08', '14:45:00', 'Dental Check-up');
INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES ('Emma', 'Davis', '2023-04-11', '16:00:00', 'General Consultation');
INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES ('Sophia', 'Miller', '2023-04-15', '10:30:00', 'Herbal Consultation');
INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES ('William', 'Wilson', '2023-04-19', '14:00:00', 'Dental Check-up');
INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES ('Olivia', 'Martinez', '2023-04-22', '12:45:00', 'General Consultation');
INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES ('James', 'Garcia', '2023-04-25', '13:30:00', 'Herbal Consultation');
INSERT INTO Patients (firstname, lastname, appointment_date, appointment_time, appointment_type) VALUES ('Isabella', 'Lopez', '2023-04-29', '15:15:00', 'Dental Check-up');
