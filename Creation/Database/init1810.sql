CREATE TABLE IF NOT EXISTS document_analysis (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fileName VARCHAR(255) NOT NULL,
  analysisResult TEXT,
  uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO document_analysis (fileName, analysisResult) VALUES ('sample_doc1.txt', 'Positive');
INSERT INTO document_analysis (fileName, analysisResult) VALUES ('sample_doc2.doc', 'Positive');
INSERT INTO document_analysis (fileName, analysisResult) VALUES ('sample_doc3.docx', 'Negative');
INSERT INTO document_analysis (fileName, analysisResult) VALUES ('sample_doc4.txt', 'Neutral');
INSERT INTO document_analysis (fileName, analysisResult) VALUES ('sample_doc5.doc', 'Negative');
INSERT INTO document_analysis (fileName, analysisResult) VALUES ('sample_doc6.txt', 'Positive');
INSERT INTO document_analysis (fileName, analysisResult) VALUES ('sample_doc7.docx', 'Neutral');
INSERT INTO document_analysis (fileName, analysisResult) VALUES ('sample_doc8.txt', 'Negative');
INSERT INTO document_analysis (fileName, analysisResult) VALUES ('sample_doc9.doc', 'Neutral');
INSERT INTO document_analysis (fileName, analysisResult) VALUES ('sample_doc10.txt', 'Positive');