CREATE TABLE albums (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    artist VARCHAR(255) NOT NULL,
    release_year INT
);

INSERT INTO albums (name, artist, release_year) VALUES ('Album 1', 'Artist A', 2000);
INSERT INTO albums (name, artist, release_year) VALUES ('Album 2', 'Artist B', 1995);
INSERT INTO albums (name, artist, release_year) VALUES ('Album 3', 'Artist C', 2008);
INSERT INTO albums (name, artist, release_year) VALUES ('Album 4', 'Artist D', 2012);
INSERT INTO albums (name, artist, release_year) VALUES ('Album 5', 'Artist E', 2005);
INSERT INTO albums (name, artist, release_year) VALUES ('Album 6', 'Artist F', 1999);
INSERT INTO albums (name, artist, release_year) VALUES ('Album 7', 'Artist G', 2010);
INSERT INTO albums (name, artist, release_year) VALUES ('Album 8', 'Artist H', 2003);
INSERT INTO albums (name, artist, release_year) VALUES ('Album 9', 'Artist I', 2006);
INSERT INTO albums (name, artist, release_year) VALUES ('Album 10', 'Artist J', 2002);
