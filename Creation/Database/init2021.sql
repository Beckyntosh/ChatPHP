CREATE TABLE IF NOT EXISTS beers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  type VARCHAR(50) NOT NULL,
  abv DECIMAL(3,1) NOT NULL,
  ibu INT NOT NULL,
  description TEXT
);

INSERT INTO beers (name, type, abv, ibu, description) VALUES
('Beer1', 'IPA', 6.5, 60, 'This is a refreshing IPA with citrus notes.'),
('Beer2', 'Stout', 7.2, 40, 'A rich and creamy stout with hints of chocolate.'),
('Beer3', 'Pale Ale', 5.0, 35, 'A light and hoppy pale ale perfect for summer days.'),
('Beer4', 'Pilsner', 4.8, 30, 'Crisp and clean pilsner with a hint of bitterness.'),
('Beer5', 'Porter', 6.0, 45, 'Dark and flavorful porter with roasted malt tones.'),
('Beer6', 'Saison', 5.5, 25, 'A Belgian-style saison with fruity and spicy notes.'),
('Beer7', 'Wheat Ale', 4.5, 20, 'Light and easy-drinking wheat ale for any occasion.'),
('Beer8', 'Amber Ale', 5.8, 40, 'A well-balanced amber ale with caramel undertones.'),
('Beer9', 'Double IPA', 8.0, 70, 'An intense double IPA with a strong hop profile.'),
('Beer10', 'Barleywine', 10.5, 80, 'A bold barleywine with complex malt flavors.');
