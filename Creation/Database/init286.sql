CREATE TABLE IF NOT EXISTS MedicalRecords (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  patientName VARCHAR(255) NOT NULL,
  recordFile VARCHAR(255) NOT NULL,
  uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO MedicalRecords (patientName, recordFile) VALUES ('John Doe', 'uploads/medical_record1.pdf'),
('Jane Smith', 'uploads/medical_record2.pdf'),
('Michael Johnson', 'uploads/medical_record3.docx'),
('Sarah Williams', 'uploads/medical_record4.pdf'),
('Robert Brown', 'uploads/medical_record5.doc'),
('Emily Davis', 'uploads/medical_record6.pdf'),
('David Martinez', 'uploads/medical_record7.pdf'),
('Emma Wilson', 'uploads/medical_record8.doc'),
('James Jones', 'uploads/medical_record9.pdf'),
('Sophia Anderson', 'uploads/medical_record10.docx');
