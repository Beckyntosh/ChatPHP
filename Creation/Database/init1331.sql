CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    appointment_time DATETIME NOT NULL,
    appointment_type VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO patients (name, appointment_time, appointment_type) VALUES ('Jane Doe', '2023-04-15 10:00:00', 'dental check-up');
INSERT INTO patients (name, appointment_time, appointment_type) VALUES ('John Smith', '2023-05-20 14:30:00', 'routine check-up');
INSERT INTO patients (name, appointment_time, appointment_type) VALUES ('Alice Brown', '2023-06-10 09:45:00', 'consultation');
INSERT INTO patients (name, appointment_time, appointment_type) VALUES ('Michael Lee', '2023-06-25 11:15:00', 'dental check-up');
INSERT INTO patients (name, appointment_time, appointment_type) VALUES ('Sarah Adams', '2023-07-05 16:00:00', 'routine check-up');
INSERT INTO patients (name, appointment_time, appointment_type) VALUES ('David Wilson', '2023-07-15 13:20:00', 'consultation');
INSERT INTO patients (name, appointment_time, appointment_type) VALUES ('Emily Taylor', '2023-08-02 10:45:00', 'dental check-up');
INSERT INTO patients (name, appointment_time, appointment_type) VALUES ('James Miller', '2023-08-18 15:30:00', 'routine check-up');
INSERT INTO patients (name, appointment_time, appointment_type) VALUES ('Olivia Martinez', '2023-09-09 12:00:00', 'consultation');
INSERT INTO patients (name, appointment_time, appointment_type) VALUES ('Daniel Clark', '2023-09-25 09:00:00', 'dental check-up');