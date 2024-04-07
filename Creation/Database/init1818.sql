CREATE TABLE uploaded_texts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    analysis_result TEXT,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_texts (filename, analysis_result) VALUES ('file1.txt', 'Positive');
INSERT INTO uploaded_texts (filename, analysis_result) VALUES ('file2.txt', 'Negative');
INSERT INTO uploaded_texts (filename, analysis_result) VALUES ('file3.txt', 'Positive');
INSERT INTO uploaded_texts (filename, analysis_result) VALUES ('file4.txt', 'Negative');
INSERT INTO uploaded_texts (filename, analysis_result) VALUES ('file5.txt', 'Positive');
INSERT INTO uploaded_texts (filename, analysis_result) VALUES ('file6.txt', 'Negative');
INSERT INTO uploaded_texts (filename, analysis_result) VALUES ('file7.txt', 'Positive');
INSERT INTO uploaded_texts (filename, analysis_result) VALUES ('file8.txt', 'Negative');
INSERT INTO uploaded_texts (filename, analysis_result) VALUES ('file9.txt', 'Positive');
INSERT INTO uploaded_texts (filename, analysis_result) VALUES ('file10.txt', 'Negative');