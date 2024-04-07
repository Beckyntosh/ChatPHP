CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    appointment_type VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO patients (name, appointment_type) VALUES ('Jane Doe', 'dental check-up');
INSERT INTO patients (name, appointment_type) VALUES ('John Smith', 'eye check-up');
INSERT INTO patients (name, appointment_type) VALUES ('Emily Brown', 'dental cleaning');
INSERT INTO patients (name, appointment_type) VALUES ('Michael Johnson', 'physical exam');
INSERT INTO patients (name, appointment_type) VALUES ('Sarah Wilson', 'vaccination');
INSERT INTO patients (name, appointment_type) VALUES ('David Miller', 'flu shot');
INSERT INTO patients (name, appointment_type) VALUES ('Amanda Davis', 'blood test');
INSERT INTO patients (name, appointment_type) VALUES ('Robert Lee', 'chiropractic consultation');
INSERT INTO patients (name, appointment_type) VALUES ('Lisa Martinez', 'dermatology check-up');
INSERT INTO patients (name, appointment_type) VALUES ('Christopher Garcia', 'nutrition counseling');
