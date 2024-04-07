CREATE TABLE videos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    duration INT(6),
    category VARCHAR(30)
);

INSERT INTO videos (name, duration, category) VALUES ('Video 1', 120, 'Adventure');
INSERT INTO videos (name, duration, category) VALUES ('Video 2', 180, 'Comedy');
INSERT INTO videos (name, duration, category) VALUES ('Video 3', 150, 'Action');
INSERT INTO videos (name, duration, category) VALUES ('Video 4', 90, 'Drama');
INSERT INTO videos (name, duration, category) VALUES ('Video 5', 200, 'Thriller');
INSERT INTO videos (name, duration, category) VALUES ('Video 6', 110, 'Sci-Fi');
INSERT INTO videos (name, duration, category) VALUES ('Video 7', 140, 'Fantasy');
INSERT INTO videos (name, duration, category) VALUES ('Video 8', 170, 'Horror');
INSERT INTO videos (name, duration, category) VALUES ('Video 9', 130, 'Mystery');
INSERT INTO videos (name, duration, category) VALUES ('Video 10', 160, 'Romance');

CREATE TABLE playlists (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    videos TEXT
);
