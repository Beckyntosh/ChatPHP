CREATE TABLE IF NOT EXISTS user_dashboard (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
userid INT(6) UNSIGNED NOT NULL,
widget_layout VARCHAR(255) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO user_dashboard (userid, widget_layout) VALUES (1, 'layout1');
INSERT INTO user_dashboard (userid, widget_layout) VALUES (2, 'layout2');
INSERT INTO user_dashboard (userid, widget_layout) VALUES (3, 'layout3');
INSERT INTO user_dashboard (userid, widget_layout) VALUES (4, 'layout1');
INSERT INTO user_dashboard (userid, widget_layout) VALUES (5, 'layout2');
INSERT INTO user_dashboard (userid, widget_layout) VALUES (6, 'layout3');
INSERT INTO user_dashboard (userid, widget_layout) VALUES (7, 'layout1');
INSERT INTO user_dashboard (userid, widget_layout) VALUES (8, 'layout2');
INSERT INTO user_dashboard (userid, widget_layout) VALUES (9, 'layout3');
INSERT INTO user_dashboard (userid, widget_layout) VALUES (10, 'layout1');
