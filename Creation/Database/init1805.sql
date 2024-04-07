CREATE TABLE uploaded_texts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    analysis_result TEXT,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('document1.txt', 'This is a sample text for sentiment analysis.', 'Word count: 9');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('document2.txt', 'Feeling happy today.', 'Word count: 3');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('document3.txt', 'Sadness engulfed me.', 'Word count: 3');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('document4.txt', 'Excited about the project.', 'Word count: 4');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('document5.txt', 'Anxious and nervous.', 'Word count: 3');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('document6.txt', 'Truly grateful for all the support.', 'Word count: 6');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('document7.txt', 'Overwhelmed by the response.', 'Word count: 4');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('document8.txt', 'Mixed feelings about the situation.', 'Word count: 5');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('document9.txt', 'Calm and peaceful.', 'Word count: 3');
INSERT INTO uploaded_texts (filename, content, analysis_result) VALUES ('document10.txt', 'Stressed and tired.', 'Word count: 3');
