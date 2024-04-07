CREATE TABLE IF NOT EXISTS file_analysis (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    analysis_result TEXT NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO file_analysis (file_name, analysis_result) VALUES ('document1.txt', 'Positive');
INSERT INTO file_analysis (file_name, analysis_result) VALUES ('document2.txt', 'Neutral');
INSERT INTO file_analysis (file_name, analysis_result) VALUES ('document3.txt', 'Negative');
INSERT INTO file_analysis (file_name, analysis_result) VALUES ('document4.txt', 'Positive');
INSERT INTO file_analysis (file_name, analysis_result) VALUES ('document5.txt', 'Negative');
INSERT INTO file_analysis (file_name, analysis_result) VALUES ('document6.txt', 'Positive');
INSERT INTO file_analysis (file_name, analysis_result) VALUES ('document7.txt', 'Neutral');
INSERT INTO file_analysis (file_name, analysis_result) VALUES ('document8.txt', 'Negative');
INSERT INTO file_analysis (file_name, analysis_result) VALUES ('document9.txt', 'Positive');
INSERT INTO file_analysis (file_name, analysis_result) VALUES ('document10.txt', 'Neutral');
