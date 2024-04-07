CREATE TABLE IF NOT EXISTS animation_files (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
filepath VARCHAR(255) NOT NULL,
upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO animation_files (filename, filepath) VALUES ('file1.mp4', 'uploads/file1.mp4');
INSERT INTO animation_files (filename, filepath) VALUES ('file2.mp4', 'uploads/file2.mp4');
INSERT INTO animation_files (filename, filepath) VALUES ('file3.avi', 'uploads/file3.avi');
INSERT INTO animation_files (filename, filepath) VALUES ('file4.avi', 'uploads/file4.avi');
INSERT INTO animation_files (filename, filepath) VALUES ('file5.mov', 'uploads/file5.mov');
INSERT INTO animation_files (filename, filepath) VALUES ('file6.mov', 'uploads/file6.mov');
INSERT INTO animation_files (filename, filepath) VALUES ('file7.mp4', 'uploads/file7.mp4');
INSERT INTO animation_files (filename, filepath) VALUES ('file8.avi', 'uploads/file8.avi');
INSERT INTO animation_files (filename, filepath) VALUES ('file9.mp4', 'uploads/file9.mp4');
INSERT INTO animation_files (filename, filepath) VALUES ('file10.avi', 'uploads/file10.avi');
