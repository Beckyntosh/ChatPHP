CREATE TABLE SentimentAnalysis (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    FileName VARCHAR(255),
    AnalysisResult VARCHAR(255),
    UploadTime TIMESTAMP
);

INSERT INTO SentimentAnalysis (FileName, AnalysisResult, UploadTime) VALUES 
('doc1.txt', 'Positive', NOW()), 
('doc2.txt', 'Negative', NOW()), 
('doc3.txt', 'Neutral', NOW()), 
('doc4.txt', 'Positive', NOW()), 
('doc5.txt', 'Negative', NOW()), 
('doc6.txt', 'Positive', NOW()), 
('doc7.txt', 'Negative', NOW()), 
('doc8.txt', 'Neutral', NOW()), 
('doc9.txt', 'Positive', NOW()), 
('doc10.txt', 'Negative', NOW());