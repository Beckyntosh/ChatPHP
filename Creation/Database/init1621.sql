CREATE TABLE IF NOT EXISTS virtual_events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(30) NOT NULL,
    event_date DATE NOT NULL,
    max_capacity INT(10),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
);

INSERT INTO virtual_events (event_name, event_date, max_capacity, description) VALUES 
('Virtual Book Club Meeting', '2022-06-15', 50, 'Discussing the latest bestseller'),
('Online Wine Tasting', '2022-06-20', 30, 'Exploring different wines from around the world'),
('Virtual Cooking Class', '2022-07-05', 25, 'Learning to cook a gourmet meal'),
('Remote Yoga Session', '2022-07-10', 40, 'Relaxing and energizing yoga practice'),
('Virtual Tech Talk', '2022-07-25', 50, 'Latest trends in technology discussed'),
('Digital Art Workshop', '2022-08-05', 20, 'Creating digital artworks using modern tools'),
('Online Music Concert', '2022-08-15', 100, 'Live performances from various artists'),
('Virtual Fitness Challenge', '2022-08-25', 75, 'Stay fit and motivated with daily challenges'),
('Remote Mindfulness Meditation', '2022-09-05', 30, 'Guided meditation for inner peace'),
('Virtual Career Fair', '2022-09-15', 200, 'Connecting job seekers with top employers');
