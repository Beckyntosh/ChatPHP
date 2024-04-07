CREATE TABLE IF NOT EXISTS print_orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  filename VARCHAR(255) NOT NULL,
  file_path VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO print_orders (filename, file_path) VALUES ('wedding_invitation_1.pdf', 'uploads/wedding_invitation_1.pdf');
INSERT INTO print_orders (filename, file_path) VALUES ('wedding_invitation_2.jpg', 'uploads/wedding_invitation_2.jpg');
INSERT INTO print_orders (filename, file_path) VALUES ('wedding_invitation_3.jpeg', 'uploads/wedding_invitation_3.jpeg');
INSERT INTO print_orders (filename, file_path) VALUES ('wedding_invitation_4.png', 'uploads/wedding_invitation_4.png');
INSERT INTO print_orders (filename, file_path) VALUES ('perfume_1.pdf', 'uploads/perfume_1.pdf');
INSERT INTO print_orders (filename, file_path) VALUES ('perfume_2.jpg', 'uploads/perfume_2.jpg');
INSERT INTO print_orders (filename, file_path) VALUES ('perfume_3.jpeg', 'uploads/perfume_3.jpeg');
INSERT INTO print_orders (filename, file_path) VALUES ('perfume_4.png', 'uploads/perfume_4.png');
INSERT INTO print_orders (filename, file_path) VALUES ('scientific_1.pdf', 'uploads/scientific_1.pdf');
INSERT INTO print_orders (filename, file_path) VALUES ('scientific_2.jpg', 'uploads/scientific_2.jpg');