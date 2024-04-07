CREATE TABLE IF NOT EXISTS dashboard_setting (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    layout VARCHAR(30) NOT NULL,
    widgets VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (1, 'grid', 'Latest Products,Best Sellers,News');
INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (2, 'list', 'Latest Products,News');
INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (3, 'grid', 'News');
INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (4, 'list', 'Best Sellers,News');
INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (5, 'grid', 'Best Sellers');
INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (6, 'list', 'Latest Products,Best Sellers');
INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (7, 'grid', 'Latest Products,News');
INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (8, 'list', 'News');
INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (9, 'grid', 'Latest Products');
INSERT INTO dashboard_setting (user_id, layout, widgets) VALUES (10, 'list', 'Best Sellers');
