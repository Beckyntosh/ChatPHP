CREATE TABLE IF NOT EXISTS user_dashboards (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    layout VARCHAR(30) NOT NULL,
    widget_settings TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_dashboards (user_id, layout, widget_settings) VALUES (1, 'grid', '{"widgets":["favorite_perfumes","new_arrivals","top_rated"]}');
INSERT INTO user_dashboards (user_id, layout, widget_settings) VALUES (1, 'list', '{"widgets":["favorite_perfumes","top_rated"]}');
INSERT INTO user_dashboards (user_id, layout, widget_settings) VALUES (1, 'grid', '{"widgets":["new_arrivals"]}');

INSERT INTO users (username, password_hash) VALUES ('john_doe', 'hashed_password');
INSERT INTO users (username, password_hash) VALUES ('jane_smith', 'hashed_password');
INSERT INTO users (username, password_hash) VALUES ('alice_wonder', 'hashed_password');
INSERT INTO users (username, password_hash) VALUES ('bob_marley', 'hashed_password');
INSERT INTO users (username, password_hash) VALUES ('sam_jackson', 'hashed_password');
