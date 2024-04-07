CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    capacity INT NOT NULL,
    details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO events (title, event_date, start_time, end_time, capacity, details) VALUES 
('Virtual Book Club Meeting', '2022-10-15', '18:00:00', '20:00:00', 30, 'Discussing latest novel'),
('Virtual Art Class', '2022-10-20', '14:00:00', '16:00:00', 25, 'Learn watercolor techniques'),
('Virtual Poetry Reading', '2022-11-05', '19:30:00', '21:30:00', 40, 'Featuring local poets'),
('Online Cooking Demo', '2022-11-10', '16:00:00', '18:00:00', 50, 'Cooking Italian cuisine'),
('Virtual Music Concert', '2022-11-15', '20:00:00', '22:00:00', 100, 'Live performance by jazz band'),
('Virtual Wine Tasting', '2022-11-20', '17:30:00', '19:30:00', 15, 'Exploring different wine varieties'),
('Online Yoga Class', '2022-12-01', '09:00:00', '10:30:00', 20, 'Morning meditation session'),
('Virtual Movie Night', '2022-12-05', '19:00:00', '21:30:00', 50, 'Screening classic films'),
('Virtual Science Seminar', '2022-12-10', '15:00:00', '17:00:00', 30, 'Guest speaker on space exploration'),
('Virtual Writers Workshop', '2022-12-15', '18:30:00', '20:30:00', 20, 'Tips for aspiring writers');
