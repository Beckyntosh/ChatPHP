CREATE TABLE IF NOT EXISTS appointments (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(50) NOT NULL,
    appointment_type VARCHAR(50) NOT NULL,
    appointment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY unique_appointment (patient_name, appointment_date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO appointments (patient_name, appointment_type) VALUES ('Jane Doe', 'Dental Check-up');
INSERT INTO appointments (patient_name, appointment_type) VALUES ('John Smith', 'Eye Check-up');
INSERT INTO appointments (patient_name, appointment_type) VALUES ('Alice Johnson', 'Physical Examination');
INSERT INTO appointments (patient_name, appointment_type) VALUES ('Michael Brown', 'Dental Check-up');
INSERT INTO appointments (patient_name, appointment_type) VALUES ('Sarah Lee', 'Orthopedic Consultation');
INSERT INTO appointments (patient_name, appointment_type) VALUES ('David Miller', 'Cardiovascular Screening');
INSERT INTO appointments (patient_name, appointment_type) VALUES ('Emily Wilson', 'Dermatology Appointment');
INSERT INTO appointments (patient_name, appointment_type) VALUES ('James Taylor', 'Neurology Consultation');
INSERT INTO appointments (patient_name, appointment_type) VALUES ('Olivia Clark', 'Mental Health Evaluation');
INSERT INTO appointments (patient_name, appointment_type) VALUES ('William Moore', 'Allergy Testing');
