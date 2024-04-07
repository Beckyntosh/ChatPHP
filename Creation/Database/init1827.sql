CREATE TABLE IF NOT EXISTS uploaded_texts (
        id INT AUTO_INCREMENT PRIMARY KEY,
        filename VARCHAR(255) NOT NULL,
        content LONGTEXT NOT NULL,
        analysis TEXT,
        upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );

INSERT INTO uploaded_texts (filename, content, analysis) VALUES ("file1.txt", "This is a good document for analysis.", "Positive");
INSERT INTO uploaded_texts (filename, content, analysis) VALUES ("file2.txt", "This document is bad and sad.", "Negative");
INSERT INTO uploaded_texts (filename, content, analysis) VALUES ("file3.txt", "Neutral content for testing.", "Neutral");
INSERT INTO uploaded_texts (filename, content, analysis) VALUES ("file4.txt", "Great stuff in this file.", "Positive");
INSERT INTO uploaded_texts (filename, content, analysis) VALUES ("file5.txt", "Happy and excellent mood in this text.", "Positive");
INSERT INTO uploaded_texts (filename, content, analysis) VALUES ("file6.txt", "Some terrible news in this document.", "Negative");
INSERT INTO uploaded_texts (filename, content, analysis) VALUES ("file7.txt", "Angry rant in this text.", "Negative");
INSERT INTO uploaded_texts (filename, content, analysis) VALUES ("file8.txt", "Awesome content uploaded.", "Positive");
INSERT INTO uploaded_texts (filename, content, analysis) VALUES ("file9.txt", "Nothing but happiness here.", "Positive");
INSERT INTO uploaded_texts (filename, content, analysis) VALUES ("file10.txt", "A mix of feelings in this file.", "Neutral");
