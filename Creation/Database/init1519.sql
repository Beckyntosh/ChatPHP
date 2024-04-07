CREATE TABLE IF NOT EXISTS immunization_records (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        patient_name VARCHAR(30) NOT NULL,
        patient_id VARCHAR(30) NOT NULL,
        immunization_record MEDIUMBLOB NOT NULL,
        record_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES ('John Doe', '123456', 'pdfdata1');
INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES ('Jane Smith', '789012', 'pdfdata2');
INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES ('Alice Johnson', '345678', 'pdfdata3');
INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES ('Bob Brown', '901234', 'pdfdata4');
INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES ('Eva Williams', '567890', 'pdfdata5');
INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES ('Michael Davis', '123789', 'pdfdata6');
INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES ('Sarah Wilson', '890123', 'pdfdata7');
INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES ('Tom Harris', '456789', 'pdfdata8');
INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES ('Laura Miller', '234567', 'pdfdata9');
INSERT INTO immunization_records (patient_name, patient_id, immunization_record) VALUES ('Chris Martinez', '678901', 'pdfdata10');
