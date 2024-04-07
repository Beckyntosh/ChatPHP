CREATE TABLE IF NOT EXISTS dashboard_settings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    layout_style VARCHAR(30) NOT NULL,
    widgets VARCHAR(255),
    creation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES (1, 'Standard', 'Calendar,Notes');
INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES (2, 'Compact', 'Calendar');
INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES (3, 'Extended', 'Calendar,Notes,Tasks');
INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES (4, 'Standard', 'Tasks');
INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES (5, 'Compact', 'Notes,Tasks');
INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES (6, 'Extended', 'Calendar,Tasks');
INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES (7, 'Standard', 'Calendar,Notes,Tasks');
INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES (8, 'Compact', 'Calendar,Notes,Tasks');
INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES (9, 'Extended', 'Calendar,Notes');
INSERT INTO dashboard_settings (user_id, layout_style, widgets) VALUES (10, 'Standard', 'Notes');
