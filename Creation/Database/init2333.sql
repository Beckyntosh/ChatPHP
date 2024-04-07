-- Create users table
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Create events table
CREATE TABLE IF NOT EXISTS events (
    event_id INT AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(255) NOT NULL,
    event_description TEXT,
    event_date DATETIME
) ENGINE=InnoDB;

-- Create registrations table
CREATE TABLE IF NOT EXISTS registrations (
    registration_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    event_id INT,
    registration_date DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(id),
    FOREIGN KEY (event_id) REFERENCES events(event_id)
) ENGINE=InnoDB;

-- Insert values into users table
INSERT INTO users (username, password) VALUES ('john_doe', 'password1');
INSERT INTO users (username, password) VALUES ('jane_smith', 'password2');

-- Insert values into events table
INSERT INTO events (event_name, event_description, event_date) VALUES ('Webinar A', 'Learn about topic A', '2022-10-01 09:00:00');
INSERT INTO events (event_name, event_description, event_date) VALUES ('Workshop B', 'Hands-on experience with topic B', '2022-11-15 14:00:00');

-- Insert values into registrations table
INSERT INTO registrations (user_id, event_id, registration_date) VALUES (1, 1, '2022-09-15 12:30:00');
INSERT INTO registrations (user_id, event_id, registration_date) VALUES (2, 2, '2022-10-20 10:00:00');
