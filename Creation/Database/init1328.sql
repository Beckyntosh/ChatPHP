CREATE TABLE Patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    appointment_reason VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO Patients (fullname, appointment_reason) VALUES ('Jane Doe', 'Dental check-up');
INSERT INTO Patients (fullname, appointment_reason) VALUES ('John Smith', 'Eye exam');
INSERT INTO Patients (fullname, appointment_reason) VALUES ('Alice Johnson', 'Physical therapy');
INSERT INTO Patients (fullname, appointment_reason) VALUES ('Michael Brown', 'Flu shot');
INSERT INTO Patients (fullname, appointment_reason) VALUES ('Emily Wilson', 'Dermatology consultation');
INSERT INTO Patients (fullname, appointment_reason) VALUES ('Kevin Lee', 'Blood work');
INSERT INTO Patients (fullname, appointment_reason) VALUES ('Sarah Adams', 'X-ray examination');
INSERT INTO Patients (fullname, appointment_reason) VALUES ('David Miller', 'Annual check-up');
INSERT INTO Patients (fullname, appointment_reason) VALUES ('Olivia Garcia', 'Psychological evaluation');
INSERT INTO Patients (fullname, appointment_reason) VALUES ('James Martinez', 'Nutritional counseling');
