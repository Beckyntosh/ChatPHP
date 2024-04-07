CREATE TABLE IF NOT EXISTS sentiment_analysis (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(256) NOT NULL,
sentiment VARCHAR(50),
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO sentiment_analysis (filename, sentiment) VALUES ('document1.txt', 'Positive');
INSERT INTO sentiment_analysis (filename, sentiment) VALUES ('document2.txt', 'Negative');
INSERT INTO sentiment_analysis (filename, sentiment) VALUES ('document3.txt', 'Positive');
INSERT INTO sentiment_analysis (filename, sentiment) VALUES ('document4.txt', 'Neutral');
INSERT INTO sentiment_analysis (filename, sentiment) VALUES ('document5.txt', 'Negative');
INSERT INTO sentiment_analysis (filename, sentiment) VALUES ('document6.txt', 'Positive');
INSERT INTO sentiment_analysis (filename, sentiment) VALUES ('document7.txt', 'Positive');
INSERT INTO sentiment_analysis (filename, sentiment) VALUES ('document8.txt', 'Negative');
INSERT INTO sentiment_analysis (filename, sentiment) VALUES ('document9.txt', 'Positive');
INSERT INTO sentiment_analysis (filename, sentiment) VALUES ('document10.txt', 'Neutral');
