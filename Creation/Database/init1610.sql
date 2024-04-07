CREATE TABLE IF NOT EXISTS uploaded_texts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
content TEXT NOT NULL,
analysis_result TEXT,
upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('text1.txt', 'This is a happy document. I love it.', 'Positive');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('text2.txt', 'I feel sad when I read this.', 'Negative');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('text3.txt', 'Neutral document with no strong emotion.', 'Neutral');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('text4.txt', 'I am very excited about this.', 'Positive');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('text5.txt', 'I am disappointed with the results.', 'Negative');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('text6.txt', 'This content is very average.', 'Neutral');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('text7.txt', 'Loving the positive vibes in this document.', 'Positive');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('text8.txt', 'Feeling down after reading this.', 'Negative');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('text9.txt', 'No strong emotional impact in this text.', 'Neutral');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('text10.txt', 'Excited to analyze this text.', 'Positive');
