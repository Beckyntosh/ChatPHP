CREATE TABLE user_dashboards (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) NOT NULL,
        layout VARCHAR(255) NOT NULL,
        widgets TEXT NOT NULL,
        created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_dashboards (user_id, layout, widgets) VALUES (1, 'grid', '["camera_feed","system_stats","recent_photos"]');
INSERT INTO user_dashboards (user_id, layout, widgets) VALUES (2, 'list', '["camera_feed","recent_photos"]');
INSERT INTO user_dashboards (user_id, layout, widgets) VALUES (3, 'grid', '["system_stats","recent_photos"]');
INSERT INTO user_dashboards (user_id, layout, widgets) VALUES (4, 'list', '["camera_feed","system_stats"]');
INSERT INTO user_dashboards (user_id, layout, widgets) VALUES (5, 'grid', '["camera_feed","recent_photos"]');
INSERT INTO user_dashboards (user_id, layout, widgets) VALUES (6, 'list', '["system_stats"]');
INSERT INTO user_dashboards (user_id, layout, widgets) VALUES (7, 'list', '["camera_feed"]');
INSERT INTO user_dashboards (user_id, layout, widgets) VALUES (8, 'grid', '["recent_photos"]');
INSERT INTO user_dashboards (user_id, layout, widgets) VALUES (9, 'grid', '["camera_feed"]');
INSERT INTO user_dashboards (user_id, layout, widgets) VALUES (10, 'list', '["system_stats"]');