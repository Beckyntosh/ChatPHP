CREATE TABLE IF NOT EXISTS uploaded_files (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_files (filename) VALUES ('landscape1.psd');
INSERT INTO uploaded_files (filename) VALUES ('landscape2.psd');
INSERT INTO uploaded_files (filename) VALUES ('landscape3.psd');
INSERT INTO uploaded_files (filename) VALUES ('landscape4.psd');
INSERT INTO uploaded_files (filename) VALUES ('landscape5.psd');
INSERT INTO uploaded_files (filename) VALUES ('landscape6.psd');
INSERT INTO uploaded_files (filename) VALUES ('landscape7.psd');
INSERT INTO uploaded_files (filename) VALUES ('landscape8.psd');
INSERT INTO uploaded_files (filename) VALUES ('landscape9.psd');
INSERT INTO uploaded_files (filename) VALUES ('landscape10.psd');