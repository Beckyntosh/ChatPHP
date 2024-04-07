CREATE TABLE IF NOT EXISTS print_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO print_orders (file_name, file_path) VALUES ('Invitation1.jpg', 'uploads/Invitation1.jpg');
INSERT INTO print_orders (file_name, file_path) VALUES ('Invitation2.jpg', 'uploads/Invitation2.jpg');
INSERT INTO print_orders (file_name, file_path) VALUES ('Invitation3.pdf', 'uploads/Invitation3.pdf');
INSERT INTO print_orders (file_name, file_path) VALUES ('Invitation4.png', 'uploads/Invitation4.png');
INSERT INTO print_orders (file_name, file_path) VALUES ('Invitation5.jpeg', 'uploads/Invitation5.jpeg');
INSERT INTO print_orders (file_name, file_path) VALUES ('Invitation6.jpg', 'uploads/Invitation6.jpg');
INSERT INTO print_orders (file_name, file_path) VALUES ('Invitation7.pdf', 'uploads/Invitation7.pdf');
INSERT INTO print_orders (file_name, file_path) VALUES ('Invitation8.png', 'uploads/Invitation8.png');
INSERT INTO print_orders (file_name, file_path) VALUES ('Invitation9.jpeg', 'uploads/Invitation9.jpeg');
INSERT INTO print_orders (file_name, file_path) VALUES ('Invitation10.jpg', 'uploads/Invitation10.jpg');
