CREATE TABLE IF NOT EXISTS poll (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question VARCHAR(255),
  option_one VARCHAR(255),
  option_two VARCHAR(255),
  option_three VARCHAR(255), 
  option_one_votes INT DEFAULT 0,
  option_two_votes INT DEFAULT 0,
  option_three_votes INT DEFAULT 0
);

INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which watch brand do you prefer?', 'Rolex', 'Omega', 'Tag Heuer');
INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which phone brand do you prefer?', 'iPhone', 'Samsung', 'Google Pixel');
INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which car brand do you prefer?', 'Toyota', 'Honda', 'Ford');
INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which clothing brand do you prefer?', 'Nike', 'Adidas', 'Puma');
INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which laptop brand do you prefer?', 'Apple', 'Dell', 'HP');
INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which music streaming platform do you prefer?', 'Spotify', 'Apple Music', 'Amazon Music');
INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which social media platform do you prefer?', 'Facebook', 'Instagram', 'Twitter');
INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which food delivery service do you prefer?', 'Uber Eats', 'Grubhub', 'DoorDash');
INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which sports brand do you prefer?', 'Nike', 'Adidas', 'Under Armour');
INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which TV show streaming platform do you prefer?', 'Netflix', 'Hulu', 'Disney+');
