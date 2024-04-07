CREATE TABLE IF NOT EXISTS Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    appointment_date DATETIME NOT NULL,
    reason VARCHAR(100),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Patients (firstname, lastname, appointment_date, reason) VALUES ('Jane', 'Doe', '2022-08-15 10:30:00', 'Dental Check-up');
INSERT INTO Patients (firstname, lastname, appointment_date, reason) VALUES ('John', 'Smith', '2022-08-17 14:45:00', 'Eye Examination');
INSERT INTO Patients (firstname, lastname, appointment_date, reason) VALUES ('Alice', 'Johnson', '2022-08-20 11:00:00', 'Physical Therapy');
INSERT INTO Patients (firstname, lastname, appointment_date, reason) VALUES ('Robert', 'Brown', '2022-08-25 09:15:00', 'Allergy Consultation');
INSERT INTO Patients (firstname, lastname, appointment_date, reason) VALUES ('Mary', 'Davis', '2022-08-28 12:30:00', 'Dermatology Check-up');
INSERT INTO Patients (firstname, lastname, appointment_date, reason) VALUES ('Michael', 'Wilson', '2022-09-02 16:00:00', 'Cardiology Consultation');
INSERT INTO Patients (firstname, lastname, appointment_date, reason) VALUES ('Sarah', 'Martinez', '2022-09-05 08:45:00', 'Nutrition Counseling');
INSERT INTO Patients (firstname, lastname, appointment_date, reason) VALUES ('David', 'Rodriguez', '2022-09-10 13:15:00', 'Psychiatry Evaluation');
INSERT INTO Patients (firstname, lastname, appointment_date, reason) VALUES ('Laura', 'Garcia', '2022-09-15 10:00:00', 'Physical Therapy');
INSERT INTO Patients (firstname, lastname, appointment_date, reason) VALUES ('Chris', 'Lee', '2022-09-20 15:30:00', 'Dental Check-up');
