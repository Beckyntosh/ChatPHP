CREATE TABLE content_analysis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    sentiment VARCHAR(255) NOT NULL
);

INSERT INTO content_analysis (filename, sentiment) VALUES ('doc1.txt', 'Positive');
INSERT INTO content_analysis (filename, sentiment) VALUES ('doc2.txt', 'Negative');
INSERT INTO content_analysis (filename, sentiment) VALUES ('doc3.txt', 'Positive');
INSERT INTO content_analysis (filename, sentiment) VALUES ('doc4.txt', 'Negative');
INSERT INTO content_analysis (filename, sentiment) VALUES ('doc5.txt', 'Positive');
INSERT INTO content_analysis (filename, sentiment) VALUES ('doc6.txt', 'Negative');
INSERT INTO content_analysis (filename, sentiment) VALUES ('doc7.txt', 'Positive');
INSERT INTO content_analysis (filename, sentiment) VALUES ('doc8.txt', 'Negative');
INSERT INTO content_analysis (filename, sentiment) VALUES ('doc9.txt', 'Positive');
INSERT INTO content_analysis (filename, sentiment) VALUES ('doc10.txt', 'Negative');
