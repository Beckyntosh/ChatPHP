CREATE TABLE IF NOT EXISTS files (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL
);

-- Insert sample data
INSERT INTO files (filename, filepath) VALUES ('landscape1.psd', 'uploads/landscape1.psd');
INSERT INTO files (filename, filepath) VALUES ('landscape2.psd', 'uploads/landscape2.psd');
INSERT INTO files (filename, filepath) VALUES ('landscape3.psd', 'uploads/landscape3.psd');
INSERT INTO files (filename, filepath) VALUES ('food1.psd', 'uploads/food1.psd');
INSERT INTO files (filename, filepath) VALUES ('food2.psd', 'uploads/food2.psd');
INSERT INTO files (filename, filepath) VALUES ('food3.psd', 'uploads/food3.psd');
INSERT INTO files (filename, filepath) VALUES ('design1.psd', 'uploads/design1.psd');
INSERT INTO files (filename, filepath) VALUES ('design2.psd', 'uploads/design2.psd');
INSERT INTO files (filename, filepath) VALUES ('design3.psd', 'uploads/design3.psd');
INSERT INTO files (filename, filepath) VALUES ('product1.psd', 'uploads/product1.psd');
