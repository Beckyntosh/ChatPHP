CREATE TABLE IF NOT EXISTS appointments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patientName VARCHAR(30) NOT NULL,
    appointmentDate DATE NOT NULL,
    appointmentType VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO appointments (patientName, appointmentDate, appointmentType) VALUES 
('Jane Doe', '2022-10-15', 'Dental Check-up'),
('John Smith', '2022-10-18', 'General Consultation'),
('Sarah Johnson', '2022-10-20', 'Dental Check-up'),
('Michael Thompson', '2022-10-22', 'General Consultation'),
('Emily Wilson', '2022-10-25', 'Dental Check-up'),
('David Lee', '2022-10-28', 'General Consultation'),
('Jessica Brown', '2022-10-30', 'Dental Check-up'),
('Christopher Garcia', '2022-11-02', 'General Consultation'),
('Amanda Martinez', '2022-11-05', 'Dental Check-up'),
('Andrew Robinson', '2022-11-08', 'General Consultation');