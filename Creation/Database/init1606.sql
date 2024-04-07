CREATE TABLE IF NOT EXISTS events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    capacity INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO events (title, event_date, capacity) VALUES ('Virtual Art Class', '2022-06-15', 20);
INSERT INTO events (title, event_date, capacity) VALUES ('Virtual Cooking Workshop', '2022-07-03', 15);
INSERT INTO events (title, event_date, capacity) VALUES ('Virtual Music Concert', '2022-07-20', 30);
INSERT INTO events (title, event_date, capacity) VALUES ('Virtual Fitness Session', '2022-08-02', 25);
INSERT INTO events (title, event_date, capacity) VALUES ('Virtual Science Experiment', '2022-08-10', 10);
INSERT INTO events (title, event_date, capacity) VALUES ('Virtual Poetry Reading', '2022-08-25', 18);
INSERT INTO events (title, event_date, capacity) VALUES ('Virtual Language Exchange', '2022-09-05', 12);
INSERT INTO events (title, event_date, capacity) VALUES ('Virtual Dance Class', '2022-09-20', 22);
INSERT INTO events (title, event_date, capacity) VALUES ('Virtual Panel Discussion', '2022-10-03', 28);
INSERT INTO events (title, event_date, capacity) VALUES ('Virtual Movie Night', '2022-10-15', 35);
