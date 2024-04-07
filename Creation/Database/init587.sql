CREATE TABLE products (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    product_file VARCHAR(255) NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    product_size INT(11) NOT NULL
);

INSERT INTO products (product_file, product_name, product_size) VALUES ('uploads/file1.mp3', 'File 1', 1024);
INSERT INTO products (product_file, product_name, product_size) VALUES ('uploads/file2.aac', 'File 2', 2048);
INSERT INTO products (product_file, product_name, product_size) VALUES ('uploads/file3.wav', 'File 3', 4096);
INSERT INTO products (product_file, product_name, product_size) VALUES ('uploads/file4.mp3', 'File 4', 8192);
INSERT INTO products (product_file, product_name, product_size) VALUES ('uploads/file5.aac', 'File 5', 16384);
INSERT INTO products (product_file, product_name, product_size) VALUES ('uploads/file6.wav', 'File 6', 32768);
INSERT INTO products (product_file, product_name, product_size) VALUES ('uploads/file7.mp3', 'File 7', 65536);
INSERT INTO products (product_file, product_name, product_size) VALUES ('uploads/file8.aac', 'File 8', 131072);
INSERT INTO products (product_file, product_name, product_size) VALUES ('uploads/file9.wav', 'File 9', 262144);
INSERT INTO products (product_file, product_name, product_size) VALUES ('uploads/file10.mp3', 'File 10', 524288);