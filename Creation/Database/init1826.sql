CREATE TABLE IF NOT EXISTS uploaded_files (
id INT AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255) NOT NULL,
analysis_result TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_files (file_name, analysis_result) VALUES ('file1.txt', 'Positive');
INSERT INTO uploaded_files (file_name, analysis_result) VALUES ('file2.txt', 'Positive');
INSERT INTO uploaded_files (file_name, analysis_result) VALUES ('file3.txt', 'Positive');
INSERT INTO uploaded_files (file_name, analysis_result) VALUES ('file4.txt', 'Positive');
INSERT INTO uploaded_files (file_name, analysis_result) VALUES ('file5.txt', 'Positive');
INSERT INTO uploaded_files (file_name, analysis_result) VALUES ('file6.txt', 'Positive');
INSERT INTO uploaded_files (file_name, analysis_result) VALUES ('file7.txt', 'Positive');
INSERT INTO uploaded_files (file_name, analysis_result) VALUES ('file8.txt', 'Positive');
INSERT INTO uploaded_files (file_name, analysis_result) VALUES ('file9.txt', 'Positive');
INSERT INTO uploaded_files (file_name, analysis_result) VALUES ('file10.txt', 'Positive');
