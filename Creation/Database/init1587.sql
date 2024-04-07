CREATE TABLE IF NOT EXISTS artwork (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artistName VARCHAR(30) NOT NULL,
artworkTitle VARCHAR(50),
artworkDescription TEXT,
uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES ('John Doe', 'Sunset Over Mountains', 'Beautiful painting of a sunset over mountains');
INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES ('Jane Smith', 'Abstract Dreams', 'Innovative abstract artwork representing dreams');
INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES ('Sarah Brown', 'Natures Beauty', 'Detailed painting showcasing the beauty of nature');
INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES ('Michael Johnson', 'Cityscape Nights', 'Vibrant cityscape painting capturing the essence of nights');
INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES ('Emily White', 'Ocean Harmony', 'Peaceful painting depicting harmony in the ocean');
INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES ('David Lee', 'Urban Chaos', 'Dynamic artwork representing chaos in urban environments');
INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES ('Sophia Adams', 'Vintage Visions', 'Nostalgic painting with a touch of vintage flair');
INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES ('Robert Green', 'Surreal Serenity', 'Surrealistic artwork invoking a sense of serenity');
INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES ('Megan Carter', 'Future Fusion', 'Futuristic artwork blending elements of technology and nature');
INSERT INTO artwork (artistName, artworkTitle, artworkDescription) VALUES ('Alexis Taylor', 'Magical Realms', 'Whimsical painting transporting viewers to magical realms');