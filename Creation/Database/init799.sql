-- init.sql
CREATE TABLE IF NOT EXISTS artists (
id INT AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(255),
bio TEXT,
style VARCHAR(255)
);

INSERT INTO artists (name, bio, style) VALUES ('Artist 1', 'Bio 1', 'Style 1');
INSERT INTO artists (name, bio, style) VALUES ('Artist 2', 'Bio 2', 'Style 2');
INSERT INTO artists (name, bio, style) VALUES ('Artist 3', 'Bio 3', 'Style 3');
INSERT INTO artists (name, bio, style) VALUES ('Artist 4', 'Bio 4', 'Style 4');
INSERT INTO artists (name, bio, style) VALUES ('Artist 5', 'Bio 5', 'Style 5');
INSERT INTO artists (name, bio, style) VALUES ('Artist 6', 'Bio 6', 'Style 6');
INSERT INTO artists (name, bio, style) VALUES ('Artist 7', 'Bio 7', 'Style 7');
INSERT INTO artists (name, bio, style) VALUES ('Artist 8', 'Bio 8', 'Style 8');
INSERT INTO artists (name, bio, style) VALUES ('Artist 9', 'Bio 9', 'Style 9');
INSERT INTO artists (name, bio, style) VALUES ('Artist 10', 'Bio 10', 'Style 10');