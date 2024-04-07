CREATE TABLE IF NOT EXISTS prints (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_time TIMESTAMP
);

INSERT INTO prints (filename, upload_time) VALUES ('uploads/wedding_invitation1.jpg', NOW());
INSERT INTO prints (filename, upload_time) VALUES ('uploads/wedding_invitation2.jpg', NOW());
INSERT INTO prints (filename, upload_time) VALUES ('uploads/wedding_invitation3.jpg', NOW());
INSERT INTO prints (filename, upload_time) VALUES ('uploads/wedding_invitation4.jpg', NOW());
INSERT INTO prints (filename, upload_time) VALUES ('uploads/wedding_invitation5.jpg', NOW());
INSERT INTO prints (filename, upload_time) VALUES ('uploads/wedding_invitation6.jpg', NOW());
INSERT INTO prints (filename, upload_time) VALUES ('uploads/wedding_invitation7.jpg', NOW());
INSERT INTO prints (filename, upload_time) VALUES ('uploads/wedding_invitation8.jpg', NOW());
INSERT INTO prints (filename, upload_time) VALUES ('uploads/wedding_invitation9.jpg', NOW());
INSERT INTO prints (filename, upload_time) VALUES ('uploads/wedding_invitation10.jpg', NOW());
