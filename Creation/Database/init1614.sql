CREATE TABLE IF NOT EXISTS events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(30) NOT NULL,
description TEXT,
event_date DATE,
capacity INT(6),
reg_count INT(6) DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO events (title, description, event_date, capacity) VALUES 
('Virtual Book Club Meeting', 'Discussing our latest read.', '2023-05-10', 20),
('Virtual Art Exhibition', 'Showcasing contemporary art pieces.', '2023-06-15', 30),
('Virtual Cooking Class', 'Learn how to make delicious dishes.', '2023-04-20', 15),
('Virtual Music Concert', 'Enjoy live performances from home.', '2023-07-25', 50),
('Virtual Fitness Workshop', 'Get fit with virtual group workouts.', '2023-03-12', 25),
('Virtual Wine Tasting', 'Explore different wine varieties.', '2023-09-05', 40),
('Virtual Tech Talk', 'Discussions on latest tech trends.', '2023-08-08', 30),
('Virtual Yoga Retreat', 'Relax and rejuvenate with virtual yoga sessions.', '2023-11-14', 20),
('Virtual Language Exchange', 'Practice speaking with language partners.', '2023-10-18', 10),
('Virtual Gardening Workshop', 'Learn tips for creating a beautiful garden.', '2023-12-22', 15);
