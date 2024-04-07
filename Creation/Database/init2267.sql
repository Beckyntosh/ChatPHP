CREATE TABLE IF NOT EXISTS user_preferences (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  userId VARCHAR(30) NOT NULL,
  favoriteFruit VARCHAR(50),
  preferredStore VARCHAR(50),
  reg_date TIMESTAMP
);

INSERT INTO user_preferences (userId, favoriteFruit, preferredStore) VALUES 
('1', 'Apples', 'Whole Foods'),
('2', 'Oranges', 'Trader Joe\'s'),
('3', 'Bananas', 'Safeway'),
('4', 'Apples', 'Trader Joe\'s'),
('5', 'Oranges', 'Whole Foods'),
('6', 'Bananas', 'Safeway'),
('7', 'Apples', 'Whole Foods'),
('8', 'Oranges', 'Trader Joe\'s'),
('9', 'Bananas', 'Safeway'),
('10', 'Apples', 'Trader Joe\'s');