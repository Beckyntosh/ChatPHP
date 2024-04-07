-- Create the users table if it doesn't already exist
CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) UNIQUE,
    signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    trial_end_date TIMESTAMP NOT NULL
);

-- Insert initial data into the users table
INSERT INTO users (username, email, trial_end_date) VALUES 
('JohnDoe', 'johndoe@example.com', '2022-10-01 00:00:00'),
('JaneSmith', 'janesmith@example.com', '2022-09-15 00:00:00'),
('AliceJones', 'alicejones@example.com', '2022-09-30 00:00:00'),
('BobBrown', 'bobbrown@example.com', '2022-10-05 00:00:00'),
('SarahGreen', 'sarahgreen@example.com', '2022-09-25 00:00:00'),
('MichaelClark', 'michaelclark@example.com', '2022-09-20 00:00:00'),
('EmmaWhite', 'emmawhite@example.com', '2022-10-10 00:00:00'),
('ChrisLee', 'chrislee@example.com', '2022-09-17 00:00:00'),
('OliviaTaylor', 'oliviataylor@example.com', '2022-09-28 00:00:00'),
('KevinMartin', 'kevinmartin@example.com', '2022-10-15 00:00:00');
