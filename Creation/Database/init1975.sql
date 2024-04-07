CREATE TABLE IF NOT EXISTS `print_orders` (
    `id` INT AUTO_INCREMENT PRIMARY KEY,
    `file_name` VARCHAR(255) NOT NULL,
    `upload_time` DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO print_orders (file_name) VALUES ('Wedding Invitation Design');
INSERT INTO print_orders (file_name) VALUES ('Product XYZ Design');
INSERT INTO print_orders (file_name) VALUES ('Company Logo Design');
INSERT INTO print_orders (file_name) VALUES ('Event Poster Design');
INSERT INTO print_orders (file_name) VALUES ('Business Card Design');
INSERT INTO print_orders (file_name) VALUES ('T-shirt Design');
INSERT INTO print_orders (file_name) VALUES ('Brochure Design');
INSERT INTO print_orders (file_name) VALUES ('Flyer Design');
INSERT INTO print_orders (file_name) VALUES ('Banner Design');
INSERT INTO print_orders (file_name) VALUES ('Menu Design');
