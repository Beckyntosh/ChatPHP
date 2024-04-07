CREATE TABLE IF NOT EXISTS items (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  starting_bid DECIMAL(10, 2) DEFAULT 0.00,
  provenance TEXT
);

CREATE TABLE IF NOT EXISTS bids (
  id INT AUTO_INCREMENT PRIMARY KEY,
  item_id INT,
  bid_amount DECIMAL(10, 2) DEFAULT 0.00,
  bidder_name VARCHAR(255),
  bid_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (item_id) REFERENCES items(id)
);

INSERT INTO items (name, description, starting_bid, provenance) VALUES ('Antique Vase', 'An elegant porcelain vase', 100.00, 'Family heirloom');
INSERT INTO items (name, description, starting_bid, provenance) VALUES ('Vintage Painting', 'Beautiful oil painting', 200.00, 'Acquired from art auction');
INSERT INTO items (name, description, starting_bid, provenance) VALUES ('Rare Coin Collection', 'Assorted rare coins', 500.00, 'Collector\'s estate sale');
INSERT INTO items (name, description, starting_bid, provenance) VALUES ('Historical Documents', 'Ancient manuscripts', 300.00, 'Museum collection');

INSERT INTO bids (item_id, bid_amount, bidder_name) VALUES (1, 120.00, 'John Doe');
INSERT INTO bids (item_id, bid_amount, bidder_name) VALUES (1, 150.00, 'Jane Smith');
INSERT INTO bids (item_id, bid_amount, bidder_name) VALUES (2, 250.00, 'Alice Johnson');
INSERT INTO bids (item_id, bid_amount, bidder_name) VALUES (3, 550.00, 'Michael Brown');
INSERT INTO bids (item_id, bid_amount, bidder_name) VALUES (4, 350.00, 'Emily Davis');
