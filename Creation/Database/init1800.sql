CREATE TABLE IF NOT EXISTS uploaded_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
analysis_result TEXT,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_files (filename) VALUES ('document1.txt');
INSERT INTO uploaded_files (filename) VALUES ('document2.doc');
INSERT INTO uploaded_files (filename) VALUES ('document3.docx');
INSERT INTO uploaded_files (filename) VALUES ('document4.txt');
INSERT INTO uploaded_files (filename) VALUES ('document5.doc');
INSERT INTO uploaded_files (filename) VALUES ('document6.docx');
INSERT INTO uploaded_files (filename) VALUES ('document7.txt');
INSERT INTO uploaded_files (filename) VALUES ('document8.doc');
INSERT INTO uploaded_files (filename) VALUES ('document9.docx');
INSERT INTO uploaded_files (filename) VALUES ('document10.txt');
