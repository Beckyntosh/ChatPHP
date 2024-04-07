CREATE TABLE IF NOT EXISTS analyzed_documents (
id INT AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
sentiment VARCHAR(50),
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO analyzed_documents (filename, sentiment) VALUES ('doc1.txt', 'Positive');
INSERT INTO analyzed_documents (filename, sentiment) VALUES ('doc2.txt', 'Negative');
INSERT INTO analyzed_documents (filename, sentiment) VALUES ('doc3.txt', 'Neutral');
INSERT INTO analyzed_documents (filename, sentiment) VALUES ('doc4.txt', 'Positive');
INSERT INTO analyzed_documents (filename, sentiment) VALUES ('doc5.txt', 'Negative');
INSERT INTO analyzed_documents (filename, sentiment) VALUES ('doc6.txt', 'Neutral');
INSERT INTO analyzed_documents (filename, sentiment) VALUES ('doc7.txt', 'Positive');
INSERT INTO analyzed_documents (filename, sentiment) VALUES ('doc8.txt', 'Negative');
INSERT INTO analyzed_documents (filename, sentiment) VALUES ('doc9.txt', 'Neutral');
INSERT INTO analyzed_documents (filename, sentiment) VALUES ('doc10.txt', 'Positive');
