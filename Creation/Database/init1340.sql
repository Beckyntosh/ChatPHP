CREATE TABLE IF NOT EXISTS patients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  appointment VARCHAR(100) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO patients (name, appointment) VALUES ('Jane Doe', 'Dental Check-Up');
INSERT INTO patients (name, appointment) VALUES ('John Smith', 'Eye Exam');
INSERT INTO patients (name, appointment) VALUES ('Sarah Wilson', 'Dermatology Consultation');
INSERT INTO patients (name, appointment) VALUES ('Michael Johnson', 'Physical Therapy');
INSERT INTO patients (name, appointment) VALUES ('Emily Brown', 'Cardiology Appointment');
INSERT INTO patients (name, appointment) VALUES ('David Lee', 'Orthopedic Consultation');
INSERT INTO patients (name, appointment) VALUES ('Karen Davis', 'Mammogram');
INSERT INTO patients (name, appointment) VALUES ('Chris Martinez', 'Psychology Session');
INSERT INTO patients (name, appointment) VALUES ('Amanda Rodriguez', 'Nutrition Consult');
INSERT INTO patients (name, appointment) VALUES ('Kevin Clark', 'ENT Check-Up');
