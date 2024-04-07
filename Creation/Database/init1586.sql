CREATE TABLE IF NOT EXISTS ArtGallery (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
artistName VARCHAR(50) NOT NULL,
artTitle VARCHAR(100) NOT NULL,
artDescription TEXT,
uploadDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO ArtGallery (artistName, artTitle, artDescription) VALUES ('Alice', 'Sunset Over Mountains', 'Beautiful painting capturing the serenity of a sunset over mountains');
INSERT INTO ArtGallery (artistName, artTitle, artDescription) VALUES ('Bob', 'Abstract Vision', 'An abstract piece that sparks the imagination');
INSERT INTO ArtGallery (artistName, artTitle, artDescription) VALUES ('Charlie', 'Floral Essence', 'Vibrant bouquet of flowers in full bloom');
INSERT INTO ArtGallery (artistName, artTitle, artDescription) VALUES ('Diana', 'City Lights', 'Urban landscape illuminated by neon lights');
INSERT INTO ArtGallery (artistName, artTitle, artDescription) VALUES ('Eve', 'Ocean Serenade', 'Landscape painting depicting the calm ocean under a starry sky');
INSERT INTO ArtGallery (artistName, artTitle, artDescription) VALUES ('Frank', 'Wildlife Harmony', 'Nature scene showcasing the peaceful coexistence of various animals');
INSERT INTO ArtGallery (artistName, artTitle, artDescription) VALUES ('Grace', 'Sunflower Fields', 'Field of sunflowers stretching towards the horizon under the sun');
INSERT INTO ArtGallery (artistName, artTitle, artDescription) VALUES ('Henry', 'Rising Phoenix', 'Symbolic representation of a phoenix rising from the ashes');
INSERT INTO ArtGallery (artistName, artTitle, artDescription) VALUES ('Ivy', 'Mystic Moon', 'Mysterious painting capturing the allure of the moon');
INSERT INTO ArtGallery (artistName, artTitle, artDescription) VALUES ('Jack', 'Surreal Dreams', 'Dreamlike artwork that blurs the lines between reality and fantasy');
