CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    analysis_result TEXT,
    reg_date TIMESTAMP
);

-- Inserting values into the table
INSERT INTO uploaded_files (file_name, analysis_result)
VALUES ('file1.txt', 'Positive'),
('file2.txt', 'Neutral'),
('file3.txt', 'Negative'),
('file4.txt', 'Positive'),
('file5.txt', 'Positive'),
('file6.txt', 'Neutral'),
('file7.txt', 'Negative'),
('file8.txt', 'Positive'),
('file9.txt', 'Positive'),
('file10.txt', 'Negative');