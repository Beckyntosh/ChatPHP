CREATE TABLE IF NOT EXISTS virtual_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATETIME NOT NULL,
    capacity INT DEFAULT 0,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES 
('Virtual Book Club Meeting', '2022-07-15 18:00:00', 20, 'Discussing the latest bestseller'),
('Virtual Conference', '2022-08-10 09:00:00', 100, 'Featuring industry experts and keynote speakers'),
('Online Workshop', '2022-09-05 14:30:00', 50, 'Hands-on learning experience for beginners'),
('Virtual Concert', '2022-09-20 20:00:00', 200, 'Live performances by top artists'),
('Webinar Series', '2022-10-08 11:00:00', 150, 'Educational sessions on various topics'),
('Virtual Art Exhibition', '2022-11-12 15:00:00', 30, 'Showcasing contemporary artworks'),
('Virtual Fitness Class', '2022-12-03 17:30:00', 40, 'Join us for a fun workout session'),
('Online Panel Discussion', '2023-01-18 13:00:00', 80, 'Debating current issues with experts'),
('Virtual Cooking Workshop', '2023-02-22 16:00:00', 25, 'Learn new recipes and cooking techniques'),
('Virtual Career Fair', '2023-03-30 10:00:00', 300, 'Connect with employers and explore job opportunities');