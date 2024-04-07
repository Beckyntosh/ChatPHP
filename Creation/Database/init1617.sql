CREATE TABLE IF NOT EXISTS virtual_events (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
event_name VARCHAR(100) NOT NULL,
event_description TEXT,
event_date DATETIME NOT NULL,
capacity INT(10),
reg_count INT(10) DEFAULT 0,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO virtual_events (event_name, event_description, event_date, capacity) VALUES ('Virtual Book Club Meeting', 'Discussing the latest bestseller', '2023-05-15 18:00:00', 20),
('Gaming Tournament', 'Compete for glory in the world of video games', '2023-06-10 15:30:00', 50),
('Online Concert', 'Live music experience from home', '2023-04-20 20:00:00', 100),
('Workshop: Virtual Reality Exploration', 'Learn about the future of VR technology', '2023-07-05 14:00:00', 30),
('Coding Bootcamp', 'Intensive coding sessions to level up your skills', '2023-05-30 09:00:00', 40),
('Language Exchange Session', 'Practice speaking a new language with fellow learners', '2023-06-25 16:30:00', 25),
('Cooking Class: Global Cuisine', 'Try your hand at cooking international dishes', '2023-08-12 19:00:00', 15),
('Fitness Challenge', 'Join a virtual workout session to stay active', '2023-04-15 17:30:00', 50),
('Art Exhibition Tour', 'Explore the virtual gallery of contemporary art', '2023-07-20 11:00:00', 20),
('Film Screening: Classic Movies', 'Watch timeless films together online', '2023-06-05 20:30:00', 30);
