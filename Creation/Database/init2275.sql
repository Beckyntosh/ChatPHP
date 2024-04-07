CREATE TABLE IF NOT EXISTS user_profile_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userid VARCHAR(30) NOT NULL,
    favorite_wine VARCHAR(50),
    wine_preference TEXT,
    subscription_newsletter BOOLEAN,
    reg_date TIMESTAMP
);

INSERT INTO user_profile_preferences (userid, favorite_wine, wine_preference, subscription_newsletter, reg_date) VALUES
('user1', 'Merlot', 'Dry red wines', 1, now()),
('user2', 'Chardonnay', 'Crisp white wines', 0, now()),
('user3', 'Cabernet Sauvignon', 'Full-bodied red wines', 1, now()),
('user4', 'Pinot Noir', 'Light-bodied red wines', 0, now()),
('user5', 'Sauvignon Blanc', 'Citrusy white wines', 1, now()),
('user6', 'Riesling', 'Sweet white wines', 1, now()),
('user7', 'Malbec', 'Bold red wines', 0, now()),
('user8', 'Syrah', 'Spicy red wines', 1, now()),
('user9', 'Zinfandel', 'Fruity red wines', 0, now()),
('user10', 'Rosé', 'Refreshing pink wines', 1, now());
