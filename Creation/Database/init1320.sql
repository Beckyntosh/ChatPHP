CREATE TABLE IF NOT EXISTS patients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  appointment VARCHAR(50),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO patients (name, appointment) VALUES ('Jane Doe', 'Dental Check-up');
INSERT INTO patients (name, appointment) VALUES ('John Smith', 'Eye Exam');
INSERT INTO patients (name, appointment) VALUES ('Alice Johnson', 'Flu Shot');
INSERT INTO patients (name, appointment) VALUES ('Michael Brown', 'Physical Therapy');
INSERT INTO patients (name, appointment) VALUES ('Sarah Jones', 'X-ray');
INSERT INTO patients (name, appointment) VALUES ('David Williams', 'Blood Test');
INSERT INTO patients (name, appointment) VALUES ('Emily Wilson', 'Ultrasound');
INSERT INTO patients (name, appointment) VALUES ('Daniel Wilson', 'Bone Density Test');
INSERT INTO patients (name, appointment) VALUES ('Olivia Miller', 'Colonoscopy');
INSERT INTO patients (name, appointment) VALUES ('Sophia Garcia', 'Mammogram');
