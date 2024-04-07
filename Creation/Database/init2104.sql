CREATE TABLE IF NOT EXISTS wishlists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id VARCHAR(50) NOT NULL,
  item_name VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO wishlists (user_id, item_name) VALUES ('uniqueUserID1', 'Craft Beer A');
INSERT INTO wishlists (user_id, item_name) VALUES ('uniqueUserID2', 'Craft Beer B');
INSERT INTO wishlists (user_id, item_name) VALUES ('uniqueUserID3', 'Craft Beer C');
INSERT INTO wishlists (user_id, item_name) VALUES ('uniqueUserID4', 'Craft Beer D');
INSERT INTO wishlists (user_id, item_name) VALUES ('uniqueUserID5', 'Craft Beer E');
INSERT INTO wishlists (user_id, item_name) VALUES ('uniqueUserID6', 'Craft Beer F');
INSERT INTO wishlists (user_id, item_name) VALUES ('uniqueUserID7', 'Craft Beer G');
INSERT INTO wishlists (user_id, item_name) VALUES ('uniqueUserID8', 'Craft Beer H');
INSERT INTO wishlists (user_id, item_name) VALUES ('uniqueUserID9', 'Craft Beer I');
INSERT INTO wishlists (user_id, item_name) VALUES ('uniqueUserID10', 'Craft Beer J');