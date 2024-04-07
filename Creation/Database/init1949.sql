CREATE TABLE IF NOT EXISTS print_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO print_orders (file_name, file_path) VALUES ('WeddingInvitationDesign1.jpg', 'uploads/WeddingInvitationDesign1.jpg');
INSERT INTO print_orders (file_name, file_path) VALUES ('WeddingInvitationDesign2.png', 'uploads/WeddingInvitationDesign2.png');
INSERT INTO print_orders (file_name, file_path) VALUES ('WeddingInvitationDesign3.jpeg', 'uploads/WeddingInvitationDesign3.jpeg');
INSERT INTO print_orders (file_name, file_path) VALUES ('WeddingInvitationDesign4.pdf', 'uploads/WeddingInvitationDesign4.pdf');
INSERT INTO print_orders (file_name, file_path) VALUES ('WeddingInvitationDesign5.jpg', 'uploads/WeddingInvitationDesign5.jpg');
INSERT INTO print_orders (file_name, file_path) VALUES ('WeddingInvitationDesign6.png', 'uploads/WeddingInvitationDesign6.png');
INSERT INTO print_orders (file_name, file_path) VALUES ('WeddingInvitationDesign7.jpeg', 'uploads/WeddingInvitationDesign7.jpeg');
INSERT INTO print_orders (file_name, file_path) VALUES ('WeddingInvitationDesign8.pdf', 'uploads/WeddingInvitationDesign8.pdf');
INSERT INTO print_orders (file_name, file_path) VALUES ('WeddingInvitationDesign9.jpg', 'uploads/WeddingInvitationDesign9.jpg');
INSERT INTO print_orders (file_name, file_path) VALUES ('WeddingInvitationDesign10.png', 'uploads/WeddingInvitationDesign10.png');
