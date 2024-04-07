CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time TIME NOT NULL,
    reason VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO patients (fullname, appointment_date, appointment_time, reason) VALUES ('Jane Doe', '2023-04-12', '10:00:00', 'Dental Check-up');
INSERT INTO patients (fullname, appointment_date, appointment_time, reason) VALUES ('John Smith', '2023-04-15', '14:30:00', 'Orthodontic Consultation');
INSERT INTO patients (fullname, appointment_date, appointment_time, reason) VALUES ('Alice Johnson', '2023-04-20', '09:15:00', 'Teeth Cleaning');
INSERT INTO patients (fullname, appointment_date, appointment_time, reason) VALUES ('Bob Brown', '2023-04-22', '11:45:00', 'Tooth Extraction');
INSERT INTO patients (fullname, appointment_date, appointment_time, reason) VALUES ('Sarah Davis', '2023-04-25', '16:00:00', 'Dental Implant');
INSERT INTO patients (fullname, appointment_date, appointment_time, reason) VALUES ('Michael Wilson', '2023-04-30', '13:30:00', 'Root Canal Treatment');
INSERT INTO patients (fullname, appointment_date, appointment_time, reason) VALUES ('Emily Martinez', '2023-05-05', '08:45:00', 'Emergency Toothache');
INSERT INTO patients (fullname, appointment_date, appointment_time, reason) VALUES ('David Rodriguez', '2023-05-10', '12:15:00', 'Cavity Filling');
INSERT INTO patients (fullname, appointment_date, appointment_time, reason) VALUES ('Olivia Garcia', '2023-05-15', '17:30:00', 'Gum Disease Evaluation');
INSERT INTO patients (fullname, appointment_date, appointment_time, reason) VALUES ('James Lopez', '2023-05-20', '10:30:00', 'Braces Adjustment');
