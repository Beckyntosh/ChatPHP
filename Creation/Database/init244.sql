CREATE TABLE IF NOT EXISTS uploaded_files (
id INT AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_files (filename) VALUES ('image1.psd');
INSERT INTO uploaded_files (filename) VALUES ('image2.psd');
INSERT INTO uploaded_files (filename) VALUES ('image3.psd');
INSERT INTO uploaded_files (filename) VALUES ('image4.psd');
INSERT INTO uploaded_files (filename) VALUES ('image5.psd');
INSERT INTO uploaded_files (filename) VALUES ('image6.psd');
INSERT INTO uploaded_files (filename) VALUES ('image7.psd');
INSERT INTO uploaded_files (filename) VALUES ('image8.psd');
INSERT INTO uploaded_files (filename) VALUES ('image9.psd');
INSERT INTO uploaded_files (filename) VALUES ('image10.psd');
