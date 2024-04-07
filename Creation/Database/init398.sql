CREATE TABLE IF NOT EXISTS USERS (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(100)
);

CREATE TABLE IF NOT EXISTS NEWS_PREFERENCES (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    category VARCHAR(255) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES USERS(id) ON DELETE CASCADE
);

INSERT INTO USERS (username, password, email) VALUES ('researcher1', '$2y$10$Rar2uugXK0zs2kLFJvebZuFkgnmD3JZk.hN/OX55MAv1Ob66BnKhS', 'researcher1@email.com');
INSERT INTO USERS (username, password, email) VALUES ('researcher2', '$2y$10$GxI0CGOCfui2BgqFuji0r.UmgqrhN6ipl2gqzVeob2ued7z1lFTRG', 'researcher2@email.com');
INSERT INTO USERS (username, password, email) VALUES ('researcher3', '$2y$10$uYu6nOo9MzGI/LcEdTB3juYSXFbYJLaK4Vnv/22lJhQIztxIZlVde', 'researcher3@email.com');
INSERT INTO USERS (username, password, email) VALUES ('researcher4', '$2y$10$WRq8LP4vu3/YL5So9ffaLovFaZfPl5zRWmXihI8rgNrTwCuJ1xDHG', 'researcher4@email.com');
INSERT INTO USERS (username, password, email) VALUES ('researcher5', '$2y$10$69YGgDTecCtUu3oPK0JHeeIRaKJhg8fVz8vhplv5k.WjPzITSJ0uy', 'researcher5@email.com');
INSERT INTO USERS (username, password, email) VALUES ('researcher6', '$2y$10$LgaOR64/DUX6X7g2BVcMH.e6V71Y.vd8ZSmibQawhz3tccg7oQUKa', 'researcher6@email.com');
INSERT INTO USERS (username, password, email) VALUES ('researcher7', '$2y$10$IDM4cfm8hwHquF3W1f5iDOuLhHCQxthG6qmUFLE9/3KbewupWKq3C', 'researcher7@email.com');
INSERT INTO USERS (username, password, email) VALUES ('researcher8', '$2y$10$tK/urahHy7.Ef8f9fJoECeBQQ1Qis2gZzV8O2J746o1aTCJIJZm1q', 'researcher8@email.com');
INSERT INTO USERS (username, password, email) VALUES ('researcher9', '$2y$10$iaNIoeaQTqyyql5IGzETH.fBKVwBUOoTh1UHXC469e6sG5cRWVzle', 'researcher9@email.com');
INSERT INTO USERS (username, password, email) VALUES ('researcher10', '$2y$10$DP3ZBdP2UrxnsFu8n8LWgeFZCI2TFLcC9DiZDnjSrLozxGXUZ.OXC', 'researcher10@email.com');

INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (1, 'Luxury Watches');
INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (1, 'Vintage Collections');
INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (2, 'Sport Watches');
INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (3, 'Luxury Watches');
INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (4, 'Vintage Collections');
INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (5, 'Sport Watches');
INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (6, 'Luxury Watches');
INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (7, 'Vintage Collections');
INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (8, 'Sport Watches');
INSERT INTO NEWS_PREFERENCES (user_id, category) VALUES (9, 'Luxury Watches');
