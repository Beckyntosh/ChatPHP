CREATE TABLE IF NOT EXISTS sentiment_analysis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    sentiment VARCHAR(10) NOT NULL
);


INSERT INTO sentiment_analysis (filename, sentiment) VALUES 
('sample1.txt', 'Positive'),
('sample2.txt', 'Negative'),
('sample3.txt', 'Positive'),
('sample4.txt', 'Negative'),
('sample5.txt', 'Positive'),
('sample6.txt', 'Negative'),
('sample7.txt', 'Positive'),
('sample8.txt', 'Negative'),
('sample9.txt', 'Positive'),
('sample10.txt', 'Negative');
