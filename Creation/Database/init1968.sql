CREATE TABLE IF NOT EXISTS uploads (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP
);

INSERT INTO uploads (filename) VALUES ('uploads/wedding_invitation.jpg');
INSERT INTO uploads (filename) VALUES ('uploads/birthday_card.jpg');
INSERT INTO uploads (filename) VALUES ('uploads/flyer_design.jpg');
INSERT INTO uploads (filename) VALUES ('uploads/poster_design.jpg');
INSERT INTO uploads (filename) VALUES ('uploads/t-shirt_design.jpg');
INSERT INTO uploads (filename) VALUES ('uploads/business_card.jpg');
INSERT INTO uploads (filename) VALUES ('uploads/logo_design.jpg');
INSERT INTO uploads (filename) VALUES ('uploads/brochure_design.jpg');
INSERT INTO uploads (filename) VALUES ('uploads/menu_design.jpg');
INSERT INTO uploads (filename) VALUES ('uploads/banner_design.jpg');