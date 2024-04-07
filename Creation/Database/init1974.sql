CREATE TABLE IF NOT EXISTS file_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    );

INSERT INTO file_uploads (file_name, file_path) VALUES ('Wedding Invitation Design.pdf', 'uploads/Wedding Invitation Design.pdf');
INSERT INTO file_uploads (file_name, file_path) VALUES ('Business Card Design.png', 'uploads/Business Card Design.png');
INSERT INTO file_uploads (file_name, file_path) VALUES ('Logo Design.jpg', 'uploads/Logo Design.jpg');
INSERT INTO file_uploads (file_name, file_path) VALUES ('Flyer Design.pdf', 'uploads/Flyer Design.pdf');
INSERT INTO file_uploads (file_name, file_path) VALUES ('Brochure Design.jpeg', 'uploads/Brochure Design.jpeg');
INSERT INTO file_uploads (file_name, file_path) VALUES ('Postcard Design.jpg', 'uploads/Postcard Design.jpg');
INSERT INTO file_uploads (file_name, file_path) VALUES ('Banner Design.png', 'uploads/Banner Design.png');
INSERT INTO file_uploads (file_name, file_path) VALUES ('Catalog Design.pdf', 'uploads/Catalog Design.pdf');
INSERT INTO file_uploads (file_name, file_path) VALUES ('Poster Design.jpeg', 'uploads/Poster Design.jpeg');
INSERT INTO file_uploads (file_name, file_path) VALUES ('Menu Design.jpg', 'uploads/Menu Design.jpg');
