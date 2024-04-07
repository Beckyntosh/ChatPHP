CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    appointment_reason VARCHAR(255) NOT NULL,
    registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO patients (fullname, appointment_reason) VALUES ('Jane Doe', 'Dental check-up');
INSERT INTO patients (fullname, appointment_reason) VALUES ('John Smith', 'Eye exam');
INSERT INTO patients (fullname, appointment_reason) VALUES ('Mary Johnson', 'Physical therapy session');
INSERT INTO patients (fullname, appointment_reason) VALUES ('David Turner', 'Flu vaccination');
INSERT INTO patients (fullname, appointment_reason) VALUES ('Sarah Brown', 'Dermatology consultation');
INSERT INTO patients (fullname, appointment_reason) VALUES ('Michael White', 'Blood test');
INSERT INTO patients (fullname, appointment_reason) VALUES ('Emily Davis', 'Allergy testing');
INSERT INTO patients (fullname, appointment_reason) VALUES ('Robert Wilson', 'X-ray scan');
INSERT INTO patients (fullname, appointment_reason) VALUES ('Linda Martinez', 'Nutrition counseling');
INSERT INTO patients (fullname, appointment_reason) VALUES ('James Taylor', 'Psychological therapy');
