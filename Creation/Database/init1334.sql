CREATE TABLE patients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    appointment_type VARCHAR(255) NOT NULL
);

INSERT INTO patients (name, appointment_type) VALUES ('John Smith', 'Eye Exam');
INSERT INTO patients (name, appointment_type) VALUES ('Sarah Johnson', 'Dental Cleaning');
INSERT INTO patients (name, appointment_type) VALUES ('Michael Brown', 'Physical Check-Up');
INSERT INTO patients (name, appointment_type) VALUES ('Emily Wilson', 'Flu Shot');
INSERT INTO patients (name, appointment_type) VALUES ('David Lee', 'Blood Test');
INSERT INTO patients (name, appointment_type) VALUES ('Amanda Miller', 'X-ray');
INSERT INTO patients (name, appointment_type) VALUES ('Daniel Clark', 'Ultrasound');
INSERT INTO patients (name, appointment_type) VALUES ('Olivia Taylor', 'Allergy Test');
INSERT INTO patients (name, appointment_type) VALUES ('William Evans', 'MRI');
INSERT INTO patients (name, appointment_type) VALUES ('Sophia Martinez', 'CT Scan');
