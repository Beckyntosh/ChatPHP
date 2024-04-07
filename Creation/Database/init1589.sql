CREATE TABLE IF NOT EXISTS Artwork (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    artistName VARCHAR(30) NOT NULL,
    artworkTitle VARCHAR(50),
    description TEXT,
    uploadDate TIMESTAMP
);

INSERT INTO Artwork (artistName, artworkTitle, description) VALUES ('John Doe', 'Sunset Over Mountains', 'Beautiful painting capturing a scenic view of mountains during sunset');
INSERT INTO Artwork (artistName, artworkTitle, description) VALUES ('Jane Smith', 'Abstract Expressionism', 'Vibrant and expressive abstract artwork');
INSERT INTO Artwork (artistName, artworkTitle, description) VALUES ('Michael Chang', 'Urban Landscapes', 'Detailed paintings of cityscapes');
INSERT INTO Artwork (artistName, artworkTitle, description) VALUES ('Emily Brown', 'Floral Fantasy', 'Artwork depicting colorful and intricate floral arrangements');
INSERT INTO Artwork (artistName, artworkTitle, description) VALUES ('Alexandra Kim', 'Mystic Waters', 'Surreal painting of a mystical water scene');
INSERT INTO Artwork (artistName, artworkTitle, description) VALUES ('David Roberts', 'Wildlife Impressions', 'Realistic portrayals of various wildlife species');
INSERT INTO Artwork (artistName, artworkTitle, description) VALUES ('Sarah Johnson', 'Dreamy Landscapes', 'Whimsical landscapes that evoke a sense of wonder');
INSERT INTO Artwork (artistName, artworkTitle, description) VALUES ('Daniel Lee', 'Portraits in Motion', 'Dynamic portraits capturing movement and expression');
INSERT INTO Artwork (artistName, artworkTitle, description) VALUES ('Sophia Adams', 'City Lights', 'Artwork inspired by the vibrant lights of the city at night');
INSERT INTO Artwork (artistName, artworkTitle, description) VALUES ('Kevin Wilson', 'Abstract Fusion', 'Fusion of abstract forms and colors in a unique composition');
