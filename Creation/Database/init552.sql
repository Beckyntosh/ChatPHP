CREATE TABLE IF NOT EXISTS uploaded_docs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255),
    filepath VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_docs (filename, filepath) VALUES ('document1.pdf', 'uploads/document1.pdf');
INSERT INTO uploaded_docs (filename, filepath) VALUES ('document2.doc', 'uploads/document2.doc');
INSERT INTO uploaded_docs (filename, filepath) VALUES ('document3.docx', 'uploads/document3.docx');
INSERT INTO uploaded_docs (filename, filepath) VALUES ('document4.pdf', 'uploads/document4.pdf');
INSERT INTO uploaded_docs (filename, filepath) VALUES ('document5.doc', 'uploads/document5.doc');
INSERT INTO uploaded_docs (filename, filepath) VALUES ('document6.docx', 'uploads/document6.docx');
INSERT INTO uploaded_docs (filename, filepath) VALUES ('document7.pdf', 'uploads/document7.pdf');
INSERT INTO uploaded_docs (filename, filepath) VALUES ('document8.doc', 'uploads/document8.doc');
INSERT INTO uploaded_docs (filename, filepath) VALUES ('document9.docx', 'uploads/document9.docx');
INSERT INTO uploaded_docs (filename, filepath) VALUES ('document10.pdf', 'uploads/document10.pdf');