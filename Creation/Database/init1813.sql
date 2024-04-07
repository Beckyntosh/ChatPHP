CREATE TABLE uploaded_texts (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        content LONGTEXT NOT NULL,
        analysis TEXT,
        upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO uploaded_texts (filename, content, analysis)
    VALUES ('document1.txt', 'This is the content of document 1 for analysis.', 'Positive sentiment');
  
INSERT INTO uploaded_texts (filename, content, analysis)
    VALUES ('document2.txt', 'This is the content of document 2 for analysis.', 'Negative sentiment');
  
INSERT INTO uploaded_texts (filename, content, analysis)
    VALUES ('document3.txt', 'This is the content of document 3 for analysis.', 'Neutral sentiment');
  
INSERT INTO uploaded_texts (filename, content, analysis)
    VALUES ('document4.txt', 'This is the content of document 4 for analysis.', 'Mixed sentiment');
  
INSERT INTO uploaded_texts (filename, content, analysis)
    VALUES ('document5.txt', 'This is the content of document 5 for analysis.', 'Positive sentiment');

INSERT INTO uploaded_texts (filename, content, analysis)
    VALUES ('document6.txt', 'This is the content of document 6 for analysis.', 'Negative sentiment');

INSERT INTO uploaded_texts (filename, content, analysis)
    VALUES ('document7.txt', 'This is the content of document 7 for analysis.', 'Neutral sentiment');

INSERT INTO uploaded_texts (filename, content, analysis)
    VALUES ('document8.txt', 'This is the content of document 8 for analysis.', 'Mixed sentiment');

INSERT INTO uploaded_texts (filename, content, analysis)
    VALUES ('document9.txt', 'This is the content of document 9 for analysis.', 'Mixed sentiment');

INSERT INTO uploaded_texts (filename, content, analysis)
    VALUES ('document10.txt', 'This is the content of document 10 for analysis.', 'Negative sentiment');