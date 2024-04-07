CREATE TABLE printing_services (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO printing_services (filename) VALUES ('uploads/wedding_invitation_1.jpg');
INSERT INTO printing_services (filename) VALUES ('uploads/wedding_invitation_2.png');
INSERT INTO printing_services (filename) VALUES ('uploads/wedding_invitation_3.jpeg');
INSERT INTO printing_services (filename) VALUES ('uploads/wedding_invitation_4.jpg');
INSERT INTO printing_services (filename) VALUES ('uploads/wedding_invitation_5.png');
INSERT INTO printing_services (filename) VALUES ('uploads/wedding_invitation_6.pdf');
INSERT INTO printing_services (filename) VALUES ('uploads/wedding_invitation_7.jpg');
INSERT INTO printing_services (filename) VALUES ('uploads/wedding_invitation_8.png');
INSERT INTO printing_services (filename) VALUES ('uploads/wedding_invitation_9.jpeg');
INSERT INTO printing_services (filename) VALUES ('uploads/wedding_invitation_10.jpg');