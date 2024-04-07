CREATE TABLE IF NOT EXISTS virtual_events (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATETIME NOT NULL,
    capacity INT(11) NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO virtual_events (event_name, event_date, capacity, description) VALUES 
('Virtual Book Club Meeting 1', '2022-07-15 10:00:00', 50, 'Discussing the latest bestseller'),
('Virtual Book Club Meeting 2', '2022-07-20 18:00:00', 30, 'Focusing on classic literature'),
('Virtual Book Club Meeting 3', '2022-07-25 15:30:00', 40, 'Book recommendations and reading goals'),
('Virtual Book Club Meeting 4', '2022-08-05 14:00:00', 25, 'Guest author interview and book signing'),
('Virtual Book Club Meeting 5', '2022-08-10 12:00:00', 60, 'Mini book swap and review session'),
('Virtual Book Club Meeting 6', '2022-08-15 16:30:00', 35, 'Genre exploration: mystery novels'),
('Virtual Book Club Meeting 7', '2022-08-20 17:45:00', 45, 'Reading challenges and group discussions'),
('Virtual Book Club Meeting 8', '2022-08-25 19:00:00', 55, 'Book-to-movie adaptations analysis'),
('Virtual Book Club Meeting 9', '2022-09-05 18:30:00', 40, 'Themed book selection: fantasy worlds'),
('Virtual Book Club Meeting 10', '2022-09-10 11:15:00', 50, 'Literary quiz and trivia night');
