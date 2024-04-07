CREATE TABLE IF NOT EXISTS user_widgets (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    widget_name VARCHAR(30) NOT NULL,
    position INT(3) UNSIGNED,
    visible BOOLEAN,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

-- Insert Values into user_widgets Table
INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES (1, 'LatestOffers', 1, 1);
INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES (1, 'PopularProducts', 2, 1);
INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES (1, 'NewArrivals', 3, 1);
INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES (1, 'BestSellers', 4, 1);
INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES (1, 'Recommended', 5, 1);
INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES (1, 'FeaturedItems', 6, 1);
INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES (1, 'TopPicks', 7, 1);
INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES (1, 'SpecialDeals', 8, 1);
INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES (1, 'LimitedEdition', 9, 1);
INSERT INTO user_widgets (user_id, widget_name, position, visible) VALUES (1, 'Clearance', 10, 1);