CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patientName VARCHAR(50) NOT NULL,
    appointmentDate DATE NOT NULL,
    service VARCHAR(100) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('Jane Doe', '2022-09-15', 'Dental Check-up');
INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('John Smith', '2022-09-17', 'Eye Check-up');
INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('Alice Johnson', '2022-09-19', 'Dental Cleaning');
INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('Bob Brown', '2022-09-20', 'Physical Examination');
INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('Emma Wilson', '2022-09-22', 'Blood Test');
INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('Mike Davis', '2022-09-24', 'X-Ray');
INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('Sarah Lee', '2022-09-26', 'Flu Shot');
INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('Tom White', '2022-09-28', 'Ultrasound');
INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('Linda Martinez', '2022-09-30', 'Allergy Testing');
INSERT INTO appointments (patientName, appointmentDate, service) VALUES ('Sam Wilson', '2022-10-02', 'Dermatology Consultation');
