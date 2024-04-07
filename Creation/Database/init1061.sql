CREATE TABLE IF NOT EXISTS board_game_reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
game_name VARCHAR(50) NOT NULL,
user_name VARCHAR(50),
rating INT(1),
review TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO board_game_reviews (game_name, user_name, rating, review) VALUES 
('Monopoly', 'Alice', 4, 'Great game for family nights'),
('Catan', 'Bob', 5, 'Highly strategic and engaging'),
('Scrabble', 'Charlie', 3, 'Classic word game, can get competitive'),
('Ticket to Ride', 'Diane', 5, 'Love the theme and gameplay'),
('Risk', 'Emily', 2, 'Requires a lot of time and patience'),
('Pandemic', 'Frank', 4, 'Cooperative gameplay is a unique twist'),
('Codenames', 'Grace', 5, 'Simple yet challenging word association game'),
('Azul', 'Henry', 4, 'Beautiful components and fun mechanics'),
('Terraforming Mars', 'Ivy', 5, 'Deep strategy and replayability'),
('Splendor', 'Jack', 3, 'Quick and enjoyable card drafting game');
