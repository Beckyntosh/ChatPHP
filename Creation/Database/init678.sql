CREATE TABLE IF NOT EXISTS uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_path VARCHAR(255) NOT NULL,
    upload_time DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploads (file_path) VALUES ('uploads/file1.psd');
INSERT INTO uploads (file_path) VALUES ('uploads/file2.psd');
INSERT INTO uploads (file_path) VALUES ('uploads/file3.psd');
INSERT INTO uploads (file_path) VALUES ('uploads/file4.psd');
INSERT INTO uploads (file_path) VALUES ('uploads/file5.psd');
INSERT INTO uploads (file_path) VALUES ('uploads/file6.psd');
INSERT INTO uploads (file_path) VALUES ('uploads/file7.psd');
INSERT INTO uploads (file_path) VALUES ('uploads/file8.psd');
INSERT INTO uploads (file_path) VALUES ('uploads/file9.psd');
INSERT INTO uploads (file_path) VALUES ('uploads/file10.psd');
