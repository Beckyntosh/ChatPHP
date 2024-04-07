CREATE TABLE IF NOT EXISTS videos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  description TEXT,
  filename VARCHAR(255),
  uploaded DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO videos (title, description, filename) VALUES ('Video 1', 'Description for Video 1', 'video1.mp4');
INSERT INTO videos (title, description, filename) VALUES ('Video 2', 'Description for Video 2', 'video2.avi');
INSERT INTO videos (title, description, filename) VALUES ('Video 3', 'Description for Video 3', 'video3.mov');
INSERT INTO videos (title, description, filename) VALUES ('Video 4', 'Description for Video 4', 'video4.mp4');
INSERT INTO videos (title, description, filename) VALUES ('Video 5', 'Description for Video 5', 'video5.avi');
INSERT INTO videos (title, description, filename) VALUES ('Video 6', 'Description for Video 6', 'video6.mov');
INSERT INTO videos (title, description, filename) VALUES ('Video 7', 'Description for Video 7', 'video7.mp4');
INSERT INTO videos (title, description, filename) VALUES ('Video 8', 'Description for Video 8', 'video8.avi');
INSERT INTO videos (title, description, filename) VALUES ('Video 9', 'Description for Video 9', 'video9.mov');
INSERT INTO videos (title, description, filename) VALUES ('Video 10', 'Description for Video 10', 'video10.mp4');
