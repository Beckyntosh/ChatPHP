CREATE TABLE IF NOT EXISTS UploadedTexts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content LONGTEXT,
    sentiment VARCHAR(30),
    reg_date TIMESTAMP
);

INSERT INTO UploadedTexts (content, sentiment) VALUES ('Lorem ipsum dolor sit amet', 'Positive');
INSERT INTO UploadedTexts (content, sentiment) VALUES ('Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'Negative');
INSERT INTO UploadedTexts (content, sentiment) VALUES ('Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi', 'Neutral');
INSERT INTO UploadedTexts (content, sentiment) VALUES ('Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas', 'Positive');
INSERT INTO UploadedTexts (content, sentiment) VALUES ('Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante', 'Negative');
INSERT INTO UploadedTexts (content, sentiment) VALUES ('Donec eu libero sit amet quam egestas semper', 'Neutral');
INSERT INTO UploadedTexts (content, sentiment) VALUES ('Aenean ultricies mi vitae est', 'Positive');
INSERT INTO UploadedTexts (content, sentiment) VALUES ('Mauris placerat eleifend leo', 'Negative');
INSERT INTO UploadedTexts (content, sentiment) VALUES ('Quisque sit amet est et sapien ullamcorper pharetra', 'Neutral');
INSERT INTO UploadedTexts (content, sentiment) VALUES ('Nam arcu nisi, commodo sit amet nibh vel, pulvinar euismod ex', 'Positive');
