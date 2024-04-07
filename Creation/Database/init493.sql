CREATE TABLE IF NOT EXISTS virtual_event (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATETIME NOT NULL,
    max_capacity INT NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO virtual_event (event_name, event_date, max_capacity, description) VALUES 
('Virtual Conference', '2022-10-15 09:00:00', 100, 'Join us for a virtual conference on the latest trends in technology'),
('Virtual Workshop', '2022-09-20 14:30:00', 50, 'Hands-on workshop on web development tools'),
('Online Music Concert', '2022-11-05 19:00:00', 200, 'Experience a virtual music concert with live performances'),
('Virtual Yoga Class', '2022-08-25 08:00:00', 30, 'Relax and rejuvenate with our virtual yoga session'),
('Virtual Art Exhibition', '2022-12-10 10:00:00', 80, 'Explore beautiful artworks in a virtual gallery'),
('Virtual Cooking Class', '2022-09-30 18:30:00', 40, 'Learn new recipes and cooking techniques in a virtual setting'),
('Virtual Movie Night', '2022-10-08 20:00:00', 150, 'Watch a classic movie together in a virtual movie night event'),
('Online Fitness Challenge', '2022-09-15 07:00:00', 50, 'Join our fitness challenge and stay active at home'),
('Virtual Wine Tasting', '2022-11-20 17:00:00', 25, 'Savor different wines and learn about wine pairing virtually'),
('Virtual Board Games Night', '2022-10-30 19:30:00', 30, 'Join us for a fun evening of virtual board games and laughter');
