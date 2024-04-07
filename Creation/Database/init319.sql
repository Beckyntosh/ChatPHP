CREATE TABLE IF NOT EXISTS user_roles (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  role ENUM('User', 'Moderator', 'Administrator') DEFAULT 'User',
  reg_date TIMESTAMP
);

INSERT INTO user_roles (username, role) VALUES ('john_doe', 'User');
INSERT INTO user_roles (username, role) VALUES ('jane_smith', 'User');
INSERT INTO user_roles (username, role) VALUES ('admin123', 'Administrator');
INSERT INTO user_roles (username, role) VALUES ('moderator007', 'Moderator');
INSERT INTO user_roles (username, role) VALUES ('test_user1', 'User');
INSERT INTO user_roles (username, role) VALUES ('test_user2', 'User');
INSERT INTO user_roles (username, role) VALUES ('test_user3', 'User');
INSERT INTO user_roles (username, role) VALUES ('moderator_test', 'Moderator');
INSERT INTO user_roles (username, role) VALUES ('admin_test', 'Administrator');
INSERT INTO user_roles (username, role) VALUES ('user_test', 'User');
