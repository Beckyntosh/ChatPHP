CREATE TABLE IF NOT EXISTS user_dashboard (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    widget_layout VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO user_dashboard (user_id, widget_layout) VALUES (1, 'Classic');
INSERT INTO user_dashboard (user_id, widget_layout) VALUES (2, 'Modern');
INSERT INTO user_dashboard (user_id, widget_layout) VALUES (3, 'Compact');
INSERT INTO user_dashboard (user_id, widget_layout) VALUES (4, 'Classic');
INSERT INTO user_dashboard (user_id, widget_layout) VALUES (5, 'Modern');
INSERT INTO user_dashboard (user_id, widget_layout) VALUES (6, 'Compact');
INSERT INTO user_dashboard (user_id, widget_layout) VALUES (7, 'Classic');
INSERT INTO user_dashboard (user_id, widget_layout) VALUES (8, 'Modern');
INSERT INTO user_dashboard (user_id, widget_layout) VALUES (9, 'Compact');
INSERT INTO user_dashboard (user_id, widget_layout) VALUES (10, 'Classic');