CREATE TABLE IF NOT EXISTS file_uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO file_uploads (file_name) VALUES ('Wedding_Invitation_Design.jpg');
INSERT INTO file_uploads (file_name) VALUES ('Business_Card_Design.png');
INSERT INTO file_uploads (file_name) VALUES ('Flyer_Design.pdf');
INSERT INTO file_uploads (file_name) VALUES ('Brochure_Design.jpg');
INSERT INTO file_uploads (file_name) VALUES ('Poster_Design.png');
INSERT INTO file_uploads (file_name) VALUES ('Banner_Design.jpg');
INSERT INTO file_uploads (file_name) VALUES ('Catalog_Design.pdf');
INSERT INTO file_uploads (file_name) VALUES ('Menu_Design.jpg');
INSERT INTO file_uploads (file_name) VALUES ('Label_Design.png');
INSERT INTO file_uploads (file_name) VALUES ('Sticker_Design.jpg');
