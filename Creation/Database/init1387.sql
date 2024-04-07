CREATE TABLE uploaded_photos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_on DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO uploaded_photos (file_name) VALUES ('landscape1.psd');
INSERT INTO uploaded_photos (file_name) VALUES ('portrait1.psd');
INSERT INTO uploaded_photos (file_name) VALUES ('nature1.psd');
INSERT INTO uploaded_photos (file_name) VALUES ('city1.psd');
INSERT INTO uploaded_photos (file_name) VALUES ('travel1.psd');
INSERT INTO uploaded_photos (file_name) VALUES ('food1.psd');
INSERT INTO uploaded_photos (file_name) VALUES ('people1.psd');
INSERT INTO uploaded_photos (file_name) VALUES ('art1.psd');
INSERT INTO uploaded_photos (file_name) VALUES ('fashion1.psd');
INSERT INTO uploaded_photos (file_name) VALUES ('animals1.psd');
