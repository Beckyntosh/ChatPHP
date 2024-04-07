CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    appointment_type VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO patients (name, appointment_type) VALUES ('Jane Doe', 'Dental Check-up');
INSERT INTO patients (name, appointment_type) VALUES ('John Smith', 'Eye Check-up');
INSERT INTO patients (name, appointment_type) VALUES ('Alice Johnson', 'X-ray');
INSERT INTO patients (name, appointment_type) VALUES ('Mark Davis', 'Physical Therapy');
INSERT INTO patients (name, appointment_type) VALUES ('Sarah Wilson', 'Blood Test');
INSERT INTO patients (name, appointment_type) VALUES ('Ryan Moore', 'Vaccination');
INSERT INTO patients (name, appointment_type) VALUES ('Emily Lee', 'Dental Check-up');
INSERT INTO patients (name, appointment_type) VALUES ('Michael Brown', 'MRI Scan');
INSERT INTO patients (name, appointment_type) VALUES ('Olivia Taylor', 'Ultrasound');
INSERT INTO patients (name, appointment_type) VALUES ('Jacob Martinez', 'Chiropractic Adjustment');
