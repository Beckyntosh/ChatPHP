CREATE TABLE documents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    uploaded_on DATETIME NOT NULL
);

INSERT INTO documents (file_name, uploaded_on) VALUES ('driver_license_1.jpg', '2022-05-01 10:30:45');
INSERT INTO documents (file_name, uploaded_on) VALUES ('driver_license_2.jpg', '2022-05-02 12:45:30');
INSERT INTO documents (file_name, uploaded_on) VALUES ('driver_license_3.jpg', '2022-05-03 08:15:20');
INSERT INTO documents (file_name, uploaded_on) VALUES ('driver_license_4.jpg', '2022-05-04 14:20:10');
INSERT INTO documents (file_name, uploaded_on) VALUES ('driver_license_5.jpg', '2022-05-05 16:55:40');
INSERT INTO documents (file_name, uploaded_on) VALUES ('driver_license_6.jpg', '2022-05-06 09:40:55');
INSERT INTO documents (file_name, uploaded_on) VALUES ('driver_license_7.jpg', '2022-05-07 11:25:35');
INSERT INTO documents (file_name, uploaded_on) VALUES ('driver_license_8.jpg', '2022-05-08 13:10:25');
INSERT INTO documents (file_name, uploaded_on) VALUES ('driver_license_9.jpg', '2022-05-09 15:30:15');
INSERT INTO documents (file_name, uploaded_on) VALUES ('driver_license_10.jpg', '2022-05-10 17:45:05');
