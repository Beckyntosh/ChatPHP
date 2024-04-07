
CREATE TABLE IF NOT EXISTS uploaded_docs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    uploaded_on DATETIME NOT NULL
);

INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('driver_license_1.pdf', NOW());
INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('driver_license_2.jpg', NOW());
INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('driver_license_3.png', NOW());
INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('driver_license_4.pdf', NOW());
INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('driver_license_5.jpg', NOW());
INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('driver_license_6.png', NOW());
INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('driver_license_7.pdf', NOW());
INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('driver_license_8.jpg', NOW());
INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('driver_license_9.png', NOW());
INSERT INTO uploaded_docs (filename, uploaded_on) VALUES ('driver_license_10.pdf', NOW());
