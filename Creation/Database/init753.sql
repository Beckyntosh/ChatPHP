CREATE TABLE IF NOT EXISTS video_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    video_title VARCHAR(100),
    video_description TEXT,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO video_uploads (video_title, video_description) VALUES ('First Video', 'Description of first video');
INSERT INTO video_uploads (video_title, video_description) VALUES ('Second Video', 'Description of second video');
INSERT INTO video_uploads (video_title, video_description) VALUES ('Third Video', 'Description of third video');
INSERT INTO video_uploads (video_title, video_description) VALUES ('Fourth Video', 'Description of fourth video');
INSERT INTO video_uploads (video_title, video_description) VALUES ('Fifth Video', 'Description of fifth video');
INSERT INTO video_uploads (video_title, video_description) VALUES ('Sixth Video', 'Description of sixth video');
INSERT INTO video_uploads (video_title, video_description) VALUES ('Seventh Video', 'Description of seventh video');
INSERT INTO video_uploads (video_title, video_description) VALUES ('Eighth Video', 'Description of eighth video');
INSERT INTO video_uploads (video_title, video_description) VALUES ('Ninth Video', 'Description of ninth video');
INSERT INTO video_uploads (video_title, video_description) VALUES ('Tenth Video', 'Description of tenth video');