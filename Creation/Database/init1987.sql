CREATE TABLE IF NOT EXISTS user_table (
    id INT AUTO_INCREMENT PRIMARY KEY, 
    username VARCHAR(255) NOT NULL, 
    password VARCHAR(255) NOT NULL,
    dashboard_layout VARCHAR(255) DEFAULT 'default',
    first_login TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)  ENGINE=INNODB;

INSERT INTO user_table (username, password, dashboard_layout) VALUES ('user1', 'password1', 'default');
INSERT INTO user_table (username, password, dashboard_layout) VALUES ('user2', 'password2', 'default');
INSERT INTO user_table (username, password, dashboard_layout) VALUES ('user3', 'password3', 'default');
INSERT INTO user_table (username, password, dashboard_layout) VALUES ('user4', 'password4', 'default');
INSERT INTO user_table (username, password, dashboard_layout) VALUES ('user5', 'password5', 'default');
INSERT INTO user_table (username, password, dashboard_layout) VALUES ('user6', 'password6', 'default');
INSERT INTO user_table (username, password, dashboard_layout) VALUES ('user7', 'password7', 'default');
INSERT INTO user_table (username, password, dashboard_layout) VALUES ('user8', 'password8', 'default');
INSERT INTO user_table (username, password, dashboard_layout) VALUES ('user9', 'password9', 'default');
INSERT INTO user_table (username, password, dashboard_layout) VALUES ('user10', 'password10', 'default');