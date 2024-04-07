CREATE TABLE IF NOT EXISTS event_feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    attendee_email VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    feedback TEXT,
    submit_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO event_feedback (event_name, attendee_email, rating, feedback) VALUES 
('Craft Beer Tasting', 'john@example.com', 5, 'Great event with a wide selection of beers.'),
('Brewery Tour', 'mary@example.com', 4, 'Informative tour, enjoyed the samples.'),
('Beer Pairing Dinner', 'alex@example.com', 5, 'Delicious food and beer combinations.'),
('Homebrewing Workshop', 'sara@example.com', 3, 'Would have liked more hands-on activities.'),
('Beer Fest', 'chris@example.com', 5, 'Amazing selection of craft beers.'),
('Beer Trivia Night', 'emily@example.com', 4, 'Fun and challenging trivia questions.'),
('IPA Appreciation', 'mike@example.com', 4, 'Educational and enjoyable event.'),
('Beer and Cheese Pairing', 'linda@example.com', 5, 'Perfect pairing combinations.'),
('Craft Beer Panel Discussion', 'peter@example.com', 3, 'Interesting topics, but too short.'),
('Beer and Chocolate Tasting', 'natalie@example.com', 5, 'Unique and delicious pairings.');
