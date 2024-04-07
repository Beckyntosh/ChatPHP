CREATE TABLE IF NOT EXISTS printing_service (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
file_name VARCHAR(255) NOT NULL,
upload_time DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
status VARCHAR(50) DEFAULT 'pending',
UNIQUE KEY unique_file (file_name)
);

INSERT INTO printing_service (file_name) VALUES ('wedding_invitation_design_1.jpg');
INSERT INTO printing_service (file_name) VALUES ('wedding_invitation_design_2.png');
INSERT INTO printing_service (file_name) VALUES ('wedding_invitation_design_3.jpeg');
INSERT INTO printing_service (file_name) VALUES ('wedding_invitation_design_4.jpg');
INSERT INTO printing_service (file_name) VALUES ('wedding_invitation_design_5.png');
INSERT INTO printing_service (file_name) VALUES ('wedding_invitation_design_6.jpeg');
INSERT INTO printing_service (file_name) VALUES ('wedding_invitation_design_7.jpg');
INSERT INTO printing_service (file_name) VALUES ('wedding_invitation_design_8.jpg');
INSERT INTO printing_service (file_name) VALUES ('wedding_invitation_design_9.png');
INSERT INTO printing_service (file_name) VALUES ('wedding_invitation_design_10.jpeg');
