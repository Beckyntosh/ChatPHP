CREATE TABLE IF NOT EXISTS user_dashboard_settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
layout VARCHAR(30) NOT NULL,
widgets TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES (1, 'grid', 'latest_products,popular_articles');
INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES (2, 'list', 'latest_products');
INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES (3, 'grid', 'popular_articles');
INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES (4, 'list', 'latest_products,popular_articles');
INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES (5, 'grid', 'latest_products');
INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES (6, 'list', 'popular_articles');
INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES (7, 'grid', 'latest_products,popular_articles');
INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES (8, 'list', 'latest_products');
INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES (9, 'grid', 'popular_articles');
INSERT INTO user_dashboard_settings (user_id, layout, widgets) VALUES (10, 'list', 'latest_products,popular_articles');