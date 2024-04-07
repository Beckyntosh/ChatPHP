CREATE TABLE IF NOT EXISTS email_attachments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filetype VARCHAR(100) NOT NULL,
    filesize INT(10) NOT NULL,
    content LONGBLOB NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO email_attachments (filename, filetype, filesize, content)
VALUES ('file1.pdf', 'application/pdf', 1000, 'file_content_1'),
       ('file2.docx', 'application/msword', 2000, 'file_content_2'),
       ('file3.jpg', 'image/jpeg', 1500, 'file_content_3'),
       ('file4.txt', 'text/plain', 800, 'file_content_4'),
       ('file5.png', 'image/png', 1200, 'file_content_5'),
       ('file6.xlsx', 'application/vnd.ms-excel', 2500, 'file_content_6'),
       ('file7.zip', 'application/zip', 3000, 'file_content_7'),
       ('file8.mp4', 'video/mp4', 3500, 'file_content_8'),
       ('file9.pptx', 'application/vnd.ms-powerpoint', 1800, 'file_content_9'),
       ('file10.gif', 'image/gif', 600, 'file_content_10');
