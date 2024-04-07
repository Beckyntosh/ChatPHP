CREATE TABLE IF NOT EXISTS virtual_events (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        description TEXT,
        start_date DATETIME,
        capacity INT,
        digital_features TEXT,
        UNIQUE(name)
);

INSERT INTO virtual_events (name, description, start_date, capacity, digital_features) VALUES 
('Event 1', 'Description for Event 1', '2022-01-01 08:00:00', 100, 'Feature 1, Feature 2'),
('Event 2', 'Description for Event 2', '2022-02-15 14:30:00', 50, 'Feature 3, Feature 4'),
('Event 3', 'Description for Event 3', '2022-03-20 10:00:00', 75, 'Feature 5, Feature 6'),
('Event 4', 'Description for Event 4', '2022-04-10 09:45:00', 120, 'Feature 7, Feature 8'),
('Event 5', 'Description for Event 5', '2022-05-05 18:20:00', 90, 'Feature 9, Feature 10'),
('Event 6', 'Description for Event 6', '2022-06-12 12:15:00', 80, 'Feature 11, Feature 12'),
('Event 7', 'Description for Event 7', '2022-07-30 17:00:00', 150, 'Feature 13, Feature 14'),
('Event 8', 'Description for Event 8', '2022-08-25 10:30:00', 70, 'Feature 15, Feature 16'),
('Event 9', 'Description for Event 9', '2022-09-18 15:45:00', 100, 'Feature 17, Feature 18'),
('Event 10', 'Description for Event 10', '2022-10-22 08:45:00', 200, 'Feature 19, Feature 20');