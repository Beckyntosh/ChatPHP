CREATE TABLE IF NOT EXISTS uploaded_documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    filename VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_documents (user_id, filename) VALUES (1, 'document1.pdf');
INSERT INTO uploaded_documents (user_id, filename) VALUES (1, 'document2.doc');
INSERT INTO uploaded_documents (user_id, filename) VALUES (1, 'document3.docx');
INSERT INTO uploaded_documents (user_id, filename) VALUES (1, 'document4.pdf');
INSERT INTO uploaded_documents (user_id, filename) VALUES (1, 'document5.doc');
INSERT INTO uploaded_documents (user_id, filename) VALUES (1, 'document6.docx');
INSERT INTO uploaded_documents (user_id, filename) VALUES (1, 'document7.pdf');
INSERT INTO uploaded_documents (user_id, filename) VALUES (1, 'document8.doc');
INSERT INTO uploaded_documents (user_id, filename) VALUES (1, 'document9.docx');
INSERT INTO uploaded_documents (user_id, filename) VALUES (1, 'document10.pdf');
