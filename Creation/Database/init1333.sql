CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    appointment_type VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO patients (fullname, appointment_type) VALUES ('Jane Doe', 'Dental Check-up');
INSERT INTO patients (fullname, appointment_type) VALUES ('John Smith', 'Eye Exam');
INSERT INTO patients (fullname, appointment_type) VALUES ('Alice Johnson', 'Physical Therapy');
INSERT INTO patients (fullname, appointment_type) VALUES ('Michael Brown', 'Dermatology Consultation');
INSERT INTO patients (fullname, appointment_type) VALUES ('Sarah Wilson', 'Psychology Session');
INSERT INTO patients (fullname, appointment_type) VALUES ('David Jones', 'Chiropractic Adjustment');
INSERT INTO patients (fullname, appointment_type) VALUES ('Emily Davis', 'Nutrition Consultation');
INSERT INTO patients (fullname, appointment_type) VALUES ('Ryan Adams', 'Allergy Testing');
INSERT INTO patients (fullname, appointment_type) VALUES ('Olivia Miller', 'Massage Therapy');
INSERT INTO patients (fullname, appointment_type) VALUES ('Ethan Martinez', 'Physical Exam');