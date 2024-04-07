CREATE TABLE IF NOT EXISTS board_game_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(50) NOT NULL,
    review TEXT NOT NULL,
    rating INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('Alice', 'Great game with nostalgic feel', 4);
INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('Bob', 'One of the best board games I have played', 5);
INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('Charlie', 'Average game, could be better', 3);
INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('David', 'Not impressed with the gameplay', 2);
INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('Eve', 'Enjoyable game for family gatherings', 4);
INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('Frank', 'Needs more variety in gameplay', 3);
INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('Grace', 'Simple yet engaging board game', 4);
INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('Hannah', 'Loved the retro style of the game', 5);
INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('Ian', 'Could use some updates for modern players', 3);
INSERT INTO board_game_reviews (user_name, review, rating) VALUES ('Jessica', 'Fun game to play with friends', 4);
