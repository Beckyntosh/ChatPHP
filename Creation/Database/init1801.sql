CREATE TABLE IF NOT EXISTS SentimentAnalysis (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fileName VARCHAR(255) NOT NULL,
    sentiment TEXT,
    uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES ('uploads/testfile1.txt', 'Positive');
INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES ('uploads/testfile2.txt', 'Negative');
INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES ('uploads/testfile3.txt', 'Neutral');
INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES ('uploads/testfile4.txt', 'Positive');
INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES ('uploads/testfile5.txt', 'Negative');
INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES ('uploads/testfile6.txt', 'Positive');
INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES ('uploads/testfile7.txt', 'Negative');
INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES ('uploads/testfile8.txt', 'Neutral');
INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES ('uploads/testfile9.txt', 'Positive');
INSERT INTO SentimentAnalysis (fileName, sentiment) VALUES ('uploads/testfile10.txt', 'Negative');
