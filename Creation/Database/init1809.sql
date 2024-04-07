CREATE TABLE IF NOT EXISTS text_analysis_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    sentiment VARCHAR(20)
);

-- Insert sample data
INSERT INTO text_analysis_uploads (filename, sentiment) VALUES ('file1.txt', 'Positive');
INSERT INTO text_analysis_uploads (filename, sentiment) VALUES ('file2.txt', 'Negative');
INSERT INTO text_analysis_uploads (filename, sentiment) VALUES ('file3.txt', 'Positive');
INSERT INTO text_analysis_uploads (filename, sentiment) VALUES ('file4.txt', 'Negative');
INSERT INTO text_analysis_uploads (filename, sentiment) VALUES ('file5.txt', 'Positive');
INSERT INTO text_analysis_uploads (filename, sentiment) VALUES ('file6.txt', 'Negative');
INSERT INTO text_analysis_uploads (filename, sentiment) VALUES ('file7.txt', 'Positive');
INSERT INTO text_analysis_uploads (filename, sentiment) VALUES ('file8.txt', 'Negative');
INSERT INTO text_analysis_uploads (filename, sentiment) VALUES ('file9.txt', 'Positive');
INSERT INTO text_analysis_uploads (filename, sentiment) VALUES ('file10.txt', 'Negative');
