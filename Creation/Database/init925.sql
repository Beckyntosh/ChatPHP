CREATE TABLE IF NOT EXISTS Uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP
);

INSERT INTO Uploads (filename, upload_time) VALUES ('document1.pdf', '2022-01-15 12:30:00');
INSERT INTO Uploads (filename, upload_time) VALUES ('document2.docx', '2022-01-16 10:45:00');
INSERT INTO Uploads (filename, upload_time) VALUES ('document3.txt', '2022-01-17 15:20:00');
INSERT INTO Uploads (filename, upload_time) VALUES ('document4.pdf', '2022-01-18 08:00:00');
INSERT INTO Uploads (filename, upload_time) VALUES ('document5.docx', '2022-01-19 11:10:00');
INSERT INTO Uploads (filename, upload_time) VALUES ('document6.txt', '2022-01-20 14:15:00');
INSERT INTO Uploads (filename, upload_time) VALUES ('document7.pdf', '2022-01-21 09:30:00');
INSERT INTO Uploads (filename, upload_time) VALUES ('document8.docx', '2022-01-22 13:40:00');
INSERT INTO Uploads (filename, upload_time) VALUES ('document9.txt', '2022-01-23 17:00:00');
INSERT INTO Uploads (filename, upload_time) VALUES ('document10.pdf', '2022-01-24 10:20:00');