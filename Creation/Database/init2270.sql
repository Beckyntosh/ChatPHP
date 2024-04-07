CREATE TABLE IF NOT EXISTS UserProfile (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    user_id VARCHAR(30) NOT NULL,
    favorite_brand VARCHAR(50),
    watch_style VARCHAR(50),
    interests VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) VALUES ('1', 'Rolex', 'Luxury', 'Swimming,Traveling');
INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) VALUES ('2', 'Casio', 'Sport', 'Hiking,Cycling');
INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) VALUES ('3', 'TAG Heuer', 'Luxury', 'Reading,Watching Movies');
INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) VALUES ('4', 'Seiko', 'Casual', 'Playing Guitar,Photography');
INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) VALUES ('5', 'Omega', 'Luxury', 'Cooking,Running');
INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) VALUES ('6', 'Timex', 'Casual', 'Painting,Dancing');
INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) VALUES ('7', 'Fossil', 'Casual', 'Gardening,Travelling');
INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) VALUES ('8', 'Citizen', 'Sport', 'Camping,Playing Soccer');
INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) VALUES ('9', 'Bvlgari', 'Luxury', 'Yoga,Mediation');
INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) VALUES ('10', 'Swatch', 'Casual', 'Fishing,Reading');
