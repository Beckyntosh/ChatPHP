CREATE TABLE IF NOT EXISTS sentiment_analysis (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fileName VARCHAR(255) NOT NULL,
    analysisResult TEXT,
    uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES ('file1.txt', 'Positive');
INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES ('file2.doc', 'Neutral');
INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES ('file3.docx', 'Negative');
INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES ('file4.txt', 'Positive');
INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES ('file5.doc', 'Positive');
INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES ('file6.docx', 'Neutral');
INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES ('file7.txt', 'Negative');
INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES ('file8.doc', 'Positive');
INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES ('file9.docx', 'Neutral');
INSERT INTO sentiment_analysis (fileName, analysisResult) VALUES ('file10.txt', 'Positive');
