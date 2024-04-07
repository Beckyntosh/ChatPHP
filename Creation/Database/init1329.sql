CREATE TABLE appointments (
  id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  patient_name VARCHAR(50) NOT NULL,
  appointment_type VARCHAR(50) NOT NULL,
  appointment_date DATE NOT NULL
);

INSERT INTO appointments (patient_name, appointment_type, appointment_date) VALUES ('Jane Doe', 'Dental Check-up', '2022-01-15');
INSERT INTO appointments (patient_name, appointment_type, appointment_date) VALUES ('John Smith', 'Eye Exam', '2022-02-20');
INSERT INTO appointments (patient_name, appointment_type, appointment_date) VALUES ('Emily Johnson', 'Blood Test', '2022-03-10');
INSERT INTO appointments (patient_name, appointment_type, appointment_date) VALUES ('Michael Brown', 'Physical Therapy', '2022-04-05');
INSERT INTO appointments (patient_name, appointment_type, appointment_date) VALUES ('Sarah Wilson', 'Dermatology Consultation', '2022-05-12');
INSERT INTO appointments (patient_name, appointment_type, appointment_date) VALUES ('David Lee', 'Orthopedic Evaluation', '2022-06-18');
INSERT INTO appointments (patient_name, appointment_type, appointment_date) VALUES ('Jennifer White', 'MRI Scan', '2022-07-23');
INSERT INTO appointments (patient_name, appointment_type, appointment_date) VALUES ('Andrew Davis', 'Cardiology Check-up', '2022-08-30');
INSERT INTO appointments (patient_name, appointment_type, appointment_date) VALUES ('Olivia Martinez', 'Allergy Testing', '2022-09-07');
INSERT INTO appointments (patient_name, appointment_type, appointment_date) VALUES ('Daniel Taylor', 'Neurology Consultation', '2022-10-15');
