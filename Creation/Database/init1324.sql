CREATE TABLE Patients (
    ID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255),
    AppointmentTime DATETIME,
    AppointmentType VARCHAR(255)
);

INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('Jane Doe', '2022-12-01 09:00:00', 'Dental Checkup');
INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('John Smith', '2022-12-02 10:30:00', 'General Checkup');
INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('Sarah Johnson', '2022-12-03 11:15:00', 'Dental Checkup');
INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('Michael Brown', '2022-12-04 14:00:00', 'General Checkup');
INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('Emily Davis', '2022-12-05 16:45:00', 'Dental Checkup');
INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('Andrew Wilson', '2022-12-06 12:30:00', 'General Checkup');
INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('Jessica Martinez', '2022-12-07 08:45:00', 'Dental Checkup');
INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('Christopher Lee', '2022-12-08 13:00:00', 'General Checkup');
INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('Amanda White', '2022-12-09 15:30:00', 'Dental Checkup');
INSERT INTO Patients (Name, AppointmentTime, AppointmentType) VALUES ('Kevin Adams', '2022-12-10 10:00:00', 'General Checkup');
