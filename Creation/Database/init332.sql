CREATE TABLE IF NOT EXISTS user_avatars (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) NOT NULL,
  avatar_name VARCHAR(255) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO user_avatars (user_id, avatar_name) VALUES ('1', 'avatar1.jpg');
INSERT INTO user_avatars (user_id, avatar_name) VALUES ('2', 'avatar2.png');
INSERT INTO user_avatars (user_id, avatar_name) VALUES ('3', 'avatar3.jpg');
INSERT INTO user_avatars (user_id, avatar_name) VALUES ('4', 'avatar4.png');
INSERT INTO user_avatars (user_id, avatar_name) VALUES ('1', 'avatar5.jpg');
INSERT INTO user_avatars (user_id, avatar_name) VALUES ('2', 'avatar6.png');
INSERT INTO user_avatars (user_id, avatar_name) VALUES ('3', 'avatar7.jpg');
INSERT INTO user_avatars (user_id, avatar_name) VALUES ('4', 'avatar8.png');
INSERT INTO user_avatars (user_id, avatar_name) VALUES ('1', 'avatar9.jpg');
INSERT INTO user_avatars (user_id, avatar_name) VALUES ('2', 'avatar10.png');
