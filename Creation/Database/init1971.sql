CREATE TABLE print_jobs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    file_name VARCHAR(255) NOT NULL,
    original_name VARCHAR(255) NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO print_jobs (file_name, original_name) VALUES 
('uploads/wedding_invitation_design.pdf', 'Wedding Invitation Design.pdf'),
('uploads/anniversary_card.jpg', 'Anniversary Card.jpg'),
('uploads/welcome_sign.jpg', 'Welcome Sign.jpg'),
('uploads/birthday_invitation.pdf', 'Birthday Invitation.pdf'),
('uploads/wine_label.jpg', 'Wine Label.jpg'),
('uploads/menu_card.pdf', 'Menu Card.pdf'),
('uploads/brochure_design.pdf', 'Brochure Design.pdf'),
('uploads/poster_art.jpg', 'Poster Art.jpg'),
('uploads/logo_design.png', 'Logo Design.png'),
('uploads/business_card_design.jpg', 'Business Card Design.jpg');
