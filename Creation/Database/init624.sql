CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    date DATE NOT NULL
);

-- Inserting sample data into events table
INSERT INTO events (name, date) VALUES ('Event 1', '2023-10-05');
INSERT INTO events (name, date) VALUES ('Event 2', '2023-10-10');
INSERT INTO events (name, date) VALUES ('Event 3', '2023-10-15');
INSERT INTO events (name, date) VALUES ('Event 4', '2023-10-20');
INSERT INTO events (name, date) VALUES ('Event 5', '2023-10-25');
INSERT INTO events (name, date) VALUES ('Event 6', '2023-10-30');
INSERT INTO events (name, date) VALUES ('Event 7', '2023-11-05');
INSERT INTO events (name, date) VALUES ('Event 8', '2023-11-10');
INSERT INTO events (name, date) VALUES ('Event 9', '2023-11-15');
INSERT INTO events (name, date) VALUES ('Event 10', '2023-11-20');