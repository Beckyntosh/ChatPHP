CREATE TABLE IF NOT EXISTS attachments (
id INT AUTO_INCREMENT PRIMARY KEY,
user_id INT,
filename VARCHAR(255),
upload_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO attachments (user_id, filename) VALUES (1, 'file1.jpg');
INSERT INTO attachments (user_id, filename) VALUES (2, 'file2.png');
INSERT INTO attachments (user_id, filename) VALUES (3, 'file3.jpeg');
INSERT INTO attachments (user_id, filename) VALUES (4, 'file4.gif');
INSERT INTO attachments (user_id, filename) VALUES (5, 'file5.pdf');
INSERT INTO attachments (user_id, filename) VALUES (6, 'file6.doc');
INSERT INTO attachments (user_id, filename) VALUES (7, 'file7.docx');
INSERT INTO attachments (user_id, filename) VALUES (8, 'file8.jpg');
INSERT INTO attachments (user_id, filename) VALUES (9, 'file9.png');
INSERT INTO attachments (user_id, filename) VALUES (10, 'file10.pdf');
