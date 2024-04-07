CREATE TABLE IF NOT EXISTS virtual_events (
    id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_date DATE NOT NULL,
    capacity INT NOT NULL,
    details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO virtual_events (event_name, event_date, capacity, details) VALUES ('Virtual Book Club Meeting 1', '2023-01-15', 50, 'Discussion on "The Great Gatsby"');
INSERT INTO virtual_events (event_name, event_date, capacity, details) VALUES ('Virtual Book Club Meeting 2', '2023-02-12', 40, 'Discussion on "To Kill a Mockingbird"');
INSERT INTO virtual_events (event_name, event_date, capacity, details) VALUES ('Virtual Book Club Meeting 3', '2023-03-20', 30, 'Discussion on "Pride and Prejudice"');
INSERT INTO virtual_events (event_name, event_date, capacity, details) VALUES ('Virtual Book Club Meeting 4', '2023-04-18', 45, 'Discussion on "The Catcher in the Rye"');
INSERT INTO virtual_events (event_name, event_date, capacity, details) VALUES ('Virtual Book Club Meeting 5', '2023-05-25', 55, 'Discussion on "Wuthering Heights"');
INSERT INTO virtual_events (event_name, event_date, capacity, details) VALUES ('Virtual Book Club Meeting 6', '2023-06-30', 60, 'Discussion on "Jane Eyre"');
INSERT INTO virtual_events (event_name, event_date, capacity, details) VALUES ('Virtual Book Club Meeting 7', '2023-07-12', 35, 'Discussion on "1984"');
INSERT INTO virtual_events (event_name, event_date, capacity, details) VALUES ('Virtual Book Club Meeting 8', '2023-08-23', 48, 'Discussion on "The Lord of the Rings"');
INSERT INTO virtual_events (event_name, event_date, capacity, details) VALUES ('Virtual Book Club Meeting 9', '2023-09-17', 42, 'Discussion on "Brave New World"');
INSERT INTO virtual_events (event_name, event_date, capacity, details) VALUES ('Virtual Book Club Meeting 10', '2023-10-29', 50, 'Discussion on "Fahrenheit 451"');
