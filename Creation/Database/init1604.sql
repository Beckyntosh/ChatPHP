CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATETIME NOT NULL,
    capacity INT NOT NULL,
    description TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO events (event_name, event_date, capacity, description) VALUES 
('Virtual Book Club Meeting', '2022-12-15 14:00:00', 30, 'A virtual meeting for discussing a specific book.'),
('Virtual Cooking Class', '2022-11-20 18:00:00', 20, 'Learn to cook organic recipes online.'),
('Virtual Yoga Session', '2022-10-25 09:00:00', 50, 'Relax and stretch with a virtual yoga class.'),
('Virtual Art Workshop', '2022-09-10 15:30:00', 15, 'Join a creative art session from home.'),
('Virtual Concert Experience', '2022-08-05 20:00:00', 100, 'Enjoy a live virtual concert.'),
('Virtual Tech Talk', '2022-07-12 12:00:00', 40, 'Discussion on the latest technology trends.'),
('Virtual Fitness Challenge', '2022-06-18 17:30:00', 25, 'Join a virtual fitness challenge.'),
('Virtual Networking Event', '2022-05-30 16:00:00', 60, 'Connect with professionals in a virtual setting.'),
('Virtual Language Exchange', '2022-04-22 10:30:00', 10, 'Practice speaking different languages online.'),
('Virtual Meditation Session', '2022-03-08 07:00:00', 35, 'Experience a guided meditation session remotely.');
