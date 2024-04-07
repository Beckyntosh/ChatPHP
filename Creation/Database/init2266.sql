CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id VARCHAR(30) NOT NULL,
favorite_color VARCHAR(30) NOT NULL,
favorite_brand VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES ('001', 'red', 'Gucci');
INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES ('002', 'blue', 'Prada');
INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES ('003', 'green', 'Louis Vuitton');
INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES ('004', 'red', 'Chanel');
INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES ('005', 'blue', 'Hermes');
INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES ('006', 'green', 'Fendi');
INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES ('007', 'red', 'Balenciaga');
INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES ('008', 'blue', 'Versace');
INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES ('009', 'green', 'Valentino');
INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES ('010', 'red', 'Yves Saint Laurent');
