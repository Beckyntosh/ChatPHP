CREATE TABLE IF NOT EXISTS event_feedback (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    eventName VARCHAR(50) NOT NULL,
    attendeeName VARCHAR(50),
    rating INT(1),
    feedback TEXT,
    submitTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
INSERT INTO event_feedback (eventName, attendeeName, rating, feedback) VALUES
('Jewelry Show', 'John Doe', 5, 'Great event, loved the collection'),
('Diamond Exhibition', 'Jane Smith', 4, 'Beautiful pieces on display'),
('Gemstone Expo', 'Alice Johnson', 3, 'Could have had more variety'),
('Gold Auction', 'Michael Brown', 5, 'Amazing experience, will attend again'),
('Silver Showcase', 'Sarah Wilson', 4, 'Enjoyed browsing the different designs'),
('Fashion Jewelry Fair', 'David Lee', 2, 'Expected more contemporary designs'),
('Artisan Jewelry Market', 'Emily Clark', 4, 'Unique handcrafted pieces'),
('Vintage Jewelry Expo', 'Robert Zhang', 3, 'Good selection of vintage items'),
('Designer Jewelry Show', 'Julia Martinez', 5, 'Incredible craftsmanship and creativity'),
('Luxury Jewelry Auction', 'Daniel Wright', 5, 'Exquisite pieces, well organized event');
