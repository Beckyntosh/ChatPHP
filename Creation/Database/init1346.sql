CREATE TABLE IF NOT EXISTS Patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Appointments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
patient_id INT(6) UNSIGNED,
appointment_date DATE NOT NULL,
appointment_time TIME NOT NULL,
description VARCHAR(100),
FOREIGN KEY (patient_id) REFERENCES Patients(id)
);

INSERT INTO Patients (fullname, email) VALUES ('Jane Doe', 'jane.doe@example.com');
INSERT INTO Patients (fullname, email) VALUES ('John Smith', 'john.smith@example.com');
INSERT INTO Patients (fullname, email) VALUES ('Alice Johnson', 'alice.johnson@example.com');
INSERT INTO Patients (fullname, email) VALUES ('Bob Williams', 'bob.williams@example.com');
INSERT INTO Patients (fullname, email) VALUES ('Sarah Brown', 'sarah.brown@example.com');
INSERT INTO Patients (fullname, email) VALUES ('Michael Davis', 'michael.davis@example.com');
INSERT INTO Patients (fullname, email) VALUES ('Emily Wilson', 'emily.wilson@example.com');
INSERT INTO Patients (fullname, email) VALUES ('David Miller', 'david.miller@example.com');
INSERT INTO Patients (fullname, email) VALUES ('Laura Martinez', 'laura.martinez@example.com');
INSERT INTO Patients (fullname, email) VALUES ('Kevin Lee', 'kevin.lee@example.com');