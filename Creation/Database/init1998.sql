CREATE TABLE uploaded_photos (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    size INT(11) NOT NULL,
    type VARCHAR(255) NOT NULL
);

INSERT INTO uploaded_photos (filename, size, type) VALUES
('landscape1.psd', 1024, 'image/psd'),
('landscape2.psd', 2048, 'image/psd'),
('landscape3.psd', 3072, 'image/psd'),
('landscape4.psd', 4096, 'image/psd'),
('landscape5.psd', 5120, 'image/psd'),
('landscape6.psd', 6144, 'image/psd'),
('landscape7.psd', 7168, 'image/psd'),
('landscape8.psd', 8192, 'image/psd'),
('landscape9.psd', 9216, 'image/psd'),
('landscape10.psd', 10240, 'image/psd');