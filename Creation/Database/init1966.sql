CREATE TABLE IF NOT EXISTS print_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO print_orders (filename, filepath) VALUES ('Wedding_Invitation_1.jpg', 'uploads/Wedding_Invitation_1.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('Wedding_Invitation_2.jpg', 'uploads/Wedding_Invitation_2.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('Wedding_Invitation_3.jpg', 'uploads/Wedding_Invitation_3.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('Wedding_Invitation_4.jpg', 'uploads/Wedding_Invitation_4.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('Wedding_Invitation_5.jpg', 'uploads/Wedding_Invitation_5.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('Wedding_Invitation_6.jpg', 'uploads/Wedding_Invitation_6.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('Wedding_Invitation_7.jpg', 'uploads/Wedding_Invitation_7.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('Wedding_Invitation_8.jpg', 'uploads/Wedding_Invitation_8.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('Wedding_Invitation_9.jpg', 'uploads/Wedding_Invitation_9.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('Wedding_Invitation_10.jpg', 'uploads/Wedding_Invitation_10.jpg');
