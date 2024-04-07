CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255),
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john@example.com', 'password123'),
('jane_smith', 'jane@example.com', 'letmein456'),
('bob_ross', 'bob@example.com', 'happylittletrees'),
('alice_wonderland', 'alice@example.com', 'downtherabbithole'),
('michael_scott', 'michael@example.com', 'dundermifflin'),
('ellen_degeneres', 'ellen@example.com', 'kindness1'),
('steve_jobs', 'steve@example.com', 'thinkdifferent'),
('marie_curie', 'marie@example.com', 'scienceiscool'),
('charlie_chaplin', 'charlie@example.com', 'silentfilms'),
('olivia_pope', 'olivia@example.com', 'gladiator123');
