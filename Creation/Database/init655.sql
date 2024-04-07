CREATE TABLE IF NOT EXISTS uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    filename VARCHAR(255),
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploads (user_id, filename) VALUES (1, 'file1.jpg');
INSERT INTO uploads (user_id, filename) VALUES (1, 'file2.png');
INSERT INTO uploads (user_id, filename) VALUES (1, 'file3.pdf');
INSERT INTO uploads (user_id, filename) VALUES (1, 'file4.docx');
INSERT INTO uploads (user_id, filename) VALUES (1, 'file5.txt');
INSERT INTO uploads (user_id, filename) VALUES (1, 'file6.xlsx');
INSERT INTO uploads (user_id, filename) VALUES (1, 'file7.jpg');
INSERT INTO uploads (user_id, filename) VALUES (1, 'file8.pdf');
INSERT INTO uploads (user_id, filename) VALUES (1, 'file9.png');
INSERT INTO uploads (user_id, filename) VALUES (1, 'file10.docx');