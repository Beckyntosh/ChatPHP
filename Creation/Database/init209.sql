CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_type VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Jane Doe', '2022-05-12', 'dental check-up');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('John Smith', '2022-06-23', 'eye check-up');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Sarah Johnson', '2022-07-18', 'physical exam');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Michael Brown', '2022-08-05', 'vaccination');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Emily Davis', '2022-09-14', 'blood test');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Robert Wilson', '2022-10-30', 'ultrasound');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Laura Martinez', '2022-11-20', 'dental cleaning');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Daniel White', '2022-12-17', 'allergy test');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('Olivia Lee', '2023-01-08', 'bone density scan');
INSERT INTO patients (name, appointment_date, appointment_type) VALUES ('William Garcia', '2023-02-19', 'heart check-up');
