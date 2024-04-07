CREATE TABLE files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    size INT NOT NULL,
    downloads INT NOT NULL
);

INSERT INTO files (name, size, downloads) VALUES
('file1.pdf', 1024, 0),
('file2.pdf', 2048, 0),
('file3.pdf', 3072, 0),
('file4.pdf', 4096, 0),
('file5.pdf', 5120, 0),
('file6.pdf', 6144, 0),
('file7.pdf', 7168, 0),
('file8.pdf', 8192, 0),
('file9.pdf', 9216, 0),
('file10.pdf', 10240, 0);
