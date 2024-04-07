CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(50) NOT NULL,
    event_date DATE NOT NULL,
    event_time TIME NOT NULL,
    capacity INT(10),
    description TEXT,
    reg_count INT(10) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO events (event_name, event_date, event_time, capacity, description) VALUES 
('Virtual Book Club Meeting', '2022-10-05', '18:00:00', 20, 'Join us for a lively discussion on the latest book selection.'),
('Virtual Art Exhibition', '2022-09-20', '15:30:00', 30, 'Explore stunning artwork from emerging artists.'),
('Virtual Yoga Class', '2022-09-25', '09:00:00', 15, 'Start your day off with a relaxing yoga session.'),
('Virtual Cooking Workshop', '2022-09-30', '17:00:00', 25, 'Learn to cook delicious meals with our expert chefs.'),
('Virtual Music Concert', '2022-10-15', '20:00:00', 50, 'Enjoy a night of music from local artists.'),
('Virtual Fitness Challenge', '2022-10-01', '12:30:00', 10, 'Get fit and have fun with our fitness challenges.'),
('Virtual Tech Talk', '2022-09-28', '14:00:00', 40, 'Stay updated on the latest tech trends and innovations.'),
('Virtual Dance Party', '2022-10-10', '19:30:00', 35, 'Dance the night away with our virtual DJ.'),
('Virtual Language Exchange', '2022-10-03', '16:00:00', 20, 'Practice and learn new languages with language enthusiasts.'),
('Virtual Movie Night', '2022-10-08', '21:00:00', 30, 'Watch a classic movie and discuss with fellow film lovers.');