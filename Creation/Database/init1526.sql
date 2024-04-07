CREATE TABLE IF NOT EXISTS animations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
feedback TEXT,
upload_date TIMESTAMP
);

INSERT INTO animations (filename, upload_date) VALUES ('Scene 1 Animations.mp4', NOW());
INSERT INTO animations (filename, upload_date) VALUES ('Scene 2 Animations.avi', NOW());
INSERT INTO animations (filename, upload_date) VALUES ('Scene 3 Animations.mov', NOW());
INSERT INTO animations (filename, upload_date) VALUES ('Scene 4 Animations.mp4', NOW());
INSERT INTO animations (filename, upload_date) VALUES ('Scene 6 Animations.avi', NOW());
INSERT INTO animations (filename, upload_date) VALUES ('Scene 7 Animations.mov', NOW());
INSERT INTO animations (filename, upload_date) VALUES ('Scene 8 Animations.mp4', NOW());
INSERT INTO animations (filename, upload_date) VALUES ('Scene 9 Animations.avi', NOW());
INSERT INTO animations (filename, upload_date) VALUES ('Scene 10 Animations.mov', NOW());
INSERT INTO animations (filename, upload_date) VALUES ('Scene 11 Animations.mp4', NOW());
