CREATE TABLE IF NOT EXISTS user_widgets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id INT(6) UNSIGNED,
widget_name VARCHAR(30) NOT NULL,
position INT(6),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Creating users table
CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(30) NOT NULL,
first_login BOOLEAN DEFAULT 1,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Inserting dummy user data
INSERT INTO users (username, password, first_login) VALUES ('user', MD5('pass'), 1);

-- Inserting widget positions data
INSERT INTO user_widgets (user_id, widget_name, position) VALUES (1, 'Widget1', 1);
INSERT INTO user_widgets (user_id, widget_name, position) VALUES (1, 'Widget2', 2);
INSERT INTO user_widgets (user_id, widget_name, position) VALUES (1, 'Widget3', 3);
INSERT INTO user_widgets (user_id, widget_name, position) VALUES (1, 'Widget4', 4);
INSERT INTO user_widgets (user_id, widget_name, position) VALUES (1, 'Widget5', 5);
INSERT INTO user_widgets (user_id, widget_name, position) VALUES (1, 'Widget6', 6);
INSERT INTO user_widgets (user_id, widget_name, position) VALUES (1, 'Widget7', 7);
INSERT INTO user_widgets (user_id, widget_name, position) VALUES (1, 'Widget8', 8);
INSERT INTO user_widgets (user_id, widget_name, position) VALUES (1, 'Widget9', 9);
INSERT INTO user_widgets (user_id, widget_name, position) VALUES (1, 'Widget10', 10);
