CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    description TEXT,
    date DATE,
    time TIME,
    capacity INT
);

INSERT INTO events (title, description, date, time, capacity) VALUES ('Event 1', 'Description for Event 1', '2021-11-15', '14:00:00', 50);
INSERT INTO events (title, description, date, time, capacity) VALUES ('Event 2', 'Description for Event 2', '2021-11-20', '16:30:00', 30);
INSERT INTO events (title, description, date, time, capacity) VALUES ('Event 3', 'Description for Event 3', '2021-11-25', '10:00:00', 20);
INSERT INTO events (title, description, date, time, capacity) VALUES ('Event 4', 'Description for Event 4', '2021-12-01', '18:00:00', 40);
INSERT INTO events (title, description, date, time, capacity) VALUES ('Event 5', 'Description for Event 5', '2021-12-05', '12:30:00', 25);
INSERT INTO events (title, description, date, time, capacity) VALUES ('Event 6', 'Description for Event 6', '2021-12-10', '15:45:00', 35);
INSERT INTO events (title, description, date, time, capacity) VALUES ('Event 7', 'Description for Event 7', '2021-12-15', '11:20:00', 45);
INSERT INTO events (title, description, date, time, capacity) VALUES ('Event 8', 'Description for Event 8', '2021-12-20', '17:00:00', 60);
INSERT INTO events (title, description, date, time, capacity) VALUES ('Event 9', 'Description for Event 9', '2021-12-25', '14:15:00', 50);
INSERT INTO events (title, description, date, time, capacity) VALUES ('Event 10', 'Description for Event 10', '2021-12-30', '13:45:00', 30);
