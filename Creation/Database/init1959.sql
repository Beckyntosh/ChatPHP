CREATE TABLE printing_jobs (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO printing_jobs (file_name, file_path) VALUES 
('Wedding Invitation Design', 'uploads/wedding_invitation_design.jpg'),
('Video Game Poster', 'uploads/video_game_poster.pdf'),
('Business Card Layout', 'uploads/business_card_layout.png'),
('Event Flyer Template', 'uploads/event_flyer_template.jpg'),
('Magazine Cover Design', 'uploads/magazine_cover_design.pdf'),
('Brochure Mockup', 'uploads/brochure_mockup.png'),
('Logo Design Concept', 'uploads/logo_design_concept.jpg'),
('Banner Ad Design', 'uploads/banner_ad_design.jpg'),
('Product Label Mockup', 'uploads/product_label_mockup.pdf'),
('Menu Template', 'uploads/menu_template.jpg');