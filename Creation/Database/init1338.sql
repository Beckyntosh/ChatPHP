CREATE TABLE IF NOT EXISTS patients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  appointment_type VARCHAR(50) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO patients (name, appointment_type) VALUES ('Jane Doe', 'dental check-up');
INSERT INTO patients (name, appointment_type) VALUES ('John Smith', 'eye exam');
INSERT INTO patients (name, appointment_type) VALUES ('Alice Johnson', 'cavity filling');
INSERT INTO patients (name, appointment_type) VALUES ('Michael Brown', 'teeth cleaning');
INSERT INTO patients (name, appointment_type) VALUES ('Sarah Lee', 'orthodontic consultation');
INSERT INTO patients (name, appointment_type) VALUES ('David Wilson', 'root canal therapy');
INSERT INTO patients (name, appointment_type) VALUES ('Emily Davis', 'dental crown placement');
INSERT INTO patients (name, appointment_type) VALUES ('Robert Martinez', 'periodontal treatment');
INSERT INTO patients (name, appointment_type) VALUES ('Christine Garcia', 'wisdom teeth removal');
INSERT INTO patients (name, appointment_type) VALUES ('Daniel Rodriguez', 'dental implant surgery');
