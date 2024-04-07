CREATE TABLE IF NOT EXISTS patients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(30) NOT NULL,
  appointment_type VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO patients (fullname, appointment_type) VALUES ('Jane Doe', 'Dental Check-up');
INSERT INTO patients (fullname, appointment_type) VALUES ('John Smith', 'Routine Check-up');
INSERT INTO patients (fullname, appointment_type) VALUES ('Alice Johnson', 'Vision Test');
INSERT INTO patients (fullname, appointment_type) VALUES ('Bob Williams', 'Hearing Test');
INSERT INTO patients (fullname, appointment_type) VALUES ('Mary Brown', 'Dental Check-up');
INSERT INTO patients (fullname, appointment_type) VALUES ('David Lee', 'Routine Check-up');
INSERT INTO patients (fullname, appointment_type) VALUES ('Karen Taylor', 'Vision Test');
INSERT INTO patients (fullname, appointment_type) VALUES ('Michael Jackson', 'Hearing Test');
INSERT INTO patients (fullname, appointment_type) VALUES ('Sarah White', 'Dental Check-up');
INSERT INTO patients (fullname, appointment_type) VALUES ('Peter Clark', 'Routine Check-up');
