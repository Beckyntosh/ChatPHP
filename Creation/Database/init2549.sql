CREATE TABLE IF NOT EXISTS user_dashboard_settings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED NOT NULL,
widget_layout TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES (1, '{"layout": "grid"}');
INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES (2, '{"layout": "list"}');
INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES (3, '{"layout": "grid"}');
INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES (4, '{"layout": "list"}');
INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES (5, '{"layout": "grid"}');
INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES (6, '{"layout": "list"}');
INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES (7, '{"layout": "grid"}');
INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES (8, '{"layout": "list"}');
INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES (9, '{"layout": "grid"}');
INSERT INTO user_dashboard_settings (user_id, widget_layout) VALUES (10, '{"layout": "list"}');
