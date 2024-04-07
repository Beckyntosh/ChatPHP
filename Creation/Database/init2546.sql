CREATE TABLE IF NOT EXISTS user_dashboard (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    user_id INT(11) NOT NULL,
    dashboard_layout VARCHAR(255) NOT NULL,
    widget_settings TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings) VALUES (1, 'default', '[{"widget":"guitar"},{"widget":"metronome"}]');
INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings) VALUES (2, 'compact', '[{"widget":"chords"}]');
INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings) VALUES (3, 'spacious', '[{"widget":"guitar"},{"widget":"chords"},{"widget":"metronome"}]');
INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings) VALUES (4, 'default', '[{"widget":"chords"}]');
INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings) VALUES (5, 'compact', '[{"widget":"guitar"}]');
INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings) VALUES (6, 'spacious', '[{"widget":"chords"},{"widget":"metronome"}]');
INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings) VALUES (7, 'default', '[{"widget":"metronome"}]');
INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings) VALUES (8, 'compact', '[{"widget":"guitar"},{"widget":"metronome"}]');
INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings) VALUES (9, 'spacious', '[{"widget":"guitar"}]');
INSERT INTO user_dashboard (user_id, dashboard_layout, widget_settings) VALUES (10, 'default', '[]');