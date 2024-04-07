CREATE TABLE IF NOT EXISTS user_avatars (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_avatars (filename) VALUES ('avatar1.jpg');
INSERT INTO user_avatars (filename) VALUES ('avatar2.png');
INSERT INTO user_avatars (filename) VALUES ('avatar3.jpg');
INSERT INTO user_avatars (filename) VALUES ('avatar4.jpg');
INSERT INTO user_avatars (filename) VALUES ('avatar5.png');
INSERT INTO user_avatars (filename) VALUES ('avatar6.jpg');
INSERT INTO user_avatars (filename) VALUES ('avatar7.png');
INSERT INTO user_avatars (filename) VALUES ('avatar8.jpg');
INSERT INTO user_avatars (filename) VALUES ('avatar9.jpg');
INSERT INTO user_avatars (filename) VALUES ('avatar10.png');
