CREATE TABLE IF NOT EXISTS patients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
appointment VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO patients (name, appointment) VALUES ('Jane Doe', 'Dental Check-up');
INSERT INTO patients (name, appointment) VALUES ('John Smith', 'Eye Check-up');
INSERT INTO patients (name, appointment) VALUES ('Emily Johnson', 'Physical Therapy');
INSERT INTO patients (name, appointment) VALUES ('Mike Brown', 'Dermatology Consultation');
INSERT INTO patients (name, appointment) VALUES ('Sarah Wilson', 'Cardiology Check-up');
INSERT INTO patients (name, appointment) VALUES ('Alex Garcia', 'Dental Cleaning');
INSERT INTO patients (name, appointment) VALUES ('Maria Martinez', 'Orthopedic Surgery Consultation');
INSERT INTO patients (name, appointment) VALUES ('Chris Anderson', 'Neurology Evaluation');
INSERT INTO patients (name, appointment) VALUES ('Lisa Thompson', 'Pediatric Check-up');
INSERT INTO patients (name, appointment) VALUES ('Kevin Wright', 'Endocrinology Consultation');