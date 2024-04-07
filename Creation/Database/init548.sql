CREATE TABLE IF NOT EXISTS downloads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    file_path VARCHAR(255)
);

INSERT INTO downloads (title, description, file_path) VALUES 
('Download 1', 'Description for Download 1', 'files/download1.txt'),
('Download 2', 'Description for Download 2', 'files/download2.pdf'),
('Download 3', 'Description for Download 3', 'files/download3.docx'),
('Download 4', 'Description for Download 4', 'files/download4.txt'),
('Download 5', 'Description for Download 5', 'files/download5.pdf'),
('Download 6', 'Description for Download 6', 'files/download6.docx'),
('Download 7', 'Description for Download 7', 'files/download7.txt'),
('Download 8', 'Description for Download 8', 'files/download8.pdf'),
('Download 9', 'Description for Download 9', 'files/download9.docx'),
('Download 10', 'Description for Download 10', 'files/download10.txt');
