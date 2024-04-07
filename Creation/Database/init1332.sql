CREATE TABLE IF NOT EXISTS patients (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    name VARCHAR(255) NOT NULL,
    appointment_type VARCHAR(255) NOT NULL,
    appointment_date DATETIME NOT NULL
);

INSERT INTO patients (name, appointment_type, appointment_date) VALUES ('Jane Doe', 'Dental Check-up', '2022-12-01 08:00:00');
INSERT INTO patients (name, appointment_type, appointment_date) VALUES ('John Smith', 'General Check-up', '2022-12-02 10:30:00');
INSERT INTO patients (name, appointment_type, appointment_date) VALUES ('Emily Brown', 'Eye Exam', '2022-12-03 15:45:00');
INSERT INTO patients (name, appointment_type, appointment_date) VALUES ('Michael Johnson', 'Dental Cleaning', '2022-12-04 09:15:00');
INSERT INTO patients (name, appointment_type, appointment_date) VALUES ('Sarah Wilson', 'Physical Therapy', '2022-12-05 11:00:00');
INSERT INTO patients (name, appointment_type, appointment_date) VALUES ('David Lee', 'Counseling Session', '2022-12-06 14:30:00');
INSERT INTO patients (name, appointment_type, appointment_date) VALUES ('Jennifer White', 'Vaccination', '2022-12-07 13:00:00');
INSERT INTO patients (name, appointment_type, appointment_date) VALUES ('Alexis Martinez', 'Flu Shot', '2022-12-08 10:00:00');
INSERT INTO patients (name, appointment_type, appointment_date) VALUES ('Daniel Brown', 'Dermatology Consultation', '2022-12-09 12:45:00');
INSERT INTO patients (name, appointment_type, appointment_date) VALUES ('Olivia Taylor', 'Nutrition Counseling', '2022-12-10 16:20:00');
