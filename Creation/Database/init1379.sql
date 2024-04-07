CREATE TABLE IF NOT EXISTS print_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO print_orders (filename, filepath) VALUES ('wedding_invitation1.jpg', 'upload/wedding_invitation1.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('wedding_invitation2.png', 'upload/wedding_invitation2.png');
INSERT INTO print_orders (filename, filepath) VALUES ('wedding_invitation3.jpeg', 'upload/wedding_invitation3.jpeg');
INSERT INTO print_orders (filename, filepath) VALUES ('wedding_invitation4.gif', 'upload/wedding_invitation4.gif');
INSERT INTO print_orders (filename, filepath) VALUES ('wedding_invitation5.jpg', 'upload/wedding_invitation5.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('wedding_invitation6.png', 'upload/wedding_invitation6.png');
INSERT INTO print_orders (filename, filepath) VALUES ('wedding_invitation7.jpeg', 'upload/wedding_invitation7.jpeg');
INSERT INTO print_orders (filename, filepath) VALUES ('wedding_invitation8.gif', 'upload/wedding_invitation8.gif');
INSERT INTO print_orders (filename, filepath) VALUES ('wedding_invitation9.jpg', 'upload/wedding_invitation9.jpg');
INSERT INTO print_orders (filename, filepath) VALUES ('wedding_invitation10.png', 'upload/wedding_invitation10.png');
