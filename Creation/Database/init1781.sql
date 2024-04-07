CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    profile_picture VARCHAR(255) NOT NULL
);

INSERT INTO users (profile_picture) VALUES ('profile1.jpg'), ('profile2.jpg'), ('profile3.jpg'), ('profile4.jpg'), ('profile5.jpg'), ('profile6.jpg'), ('profile7.jpg'), ('profile8.jpg'), ('profile9.jpg'), ('profile10.jpg');
