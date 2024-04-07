CREATE TABLE IF NOT EXISTS items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    starting_bid DECIMAL(10,2) NOT NULL,
    provenance VARCHAR(100),
    auction_end TIMESTAMP
);

CREATE TABLE IF NOT EXISTS bids (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    item_id INT(6) UNSIGNED NOT NULL,
    bid_amount DECIMAL(10,2) NOT NULL,
    bidder_name VARCHAR(50) NOT NULL,
    bid_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (item_id) REFERENCES items(id) ON DELETE CASCADE
);

INSERT INTO items (name, description, starting_bid, provenance, auction_end) VALUES 
('Antique Vase', 'Beautiful ceramic vase', 50.00, 'Europe', '2022-10-20 12:00:00'),
('Vintage Watch', 'Rare mechanical watch', 200.00, 'Switzerland', '2022-10-25 15:00:00'),
('Art Deco Lamp', 'Elegant lamp from the 1920s', 150.00, 'France', '2022-11-01 10:00:00'),
('Silver Tea Set', 'Complete set with tray', 100.00, 'England', '2022-11-10 09:00:00'),
('Chinese Porcelain Bowl', 'Hand-painted bowl', 80.00, 'China', '2022-11-15 14:00:00'),
('Oil Painting', 'Landscape painting by a renowned artist', 300.00, 'Italy', '2022-11-20 11:00:00'),
('Bronze Sculpture', 'Statue of a Greek god', 250.00, 'Greece', '2022-11-26 10:00:00'),
('Crystal Decanter', 'Exquisite glass decanter', 75.00, 'Austria', '2022-12-02 15:00:00'),
('Wood Carving', 'Hand-carved figure', 50.00, 'Japan', '2022-12-10 12:00:00'),
('Tiffany Lamp', 'Stained glass lamp', 200.00, 'United States', '2022-12-15 13:00:00');

INSERT INTO bids (item_id, bid_amount, bidder_name, bid_time) VALUES 
(1, 60.00, 'John Doe', '2022-10-21 13:00:00'),
(1, 70.00, 'Jane Smith', '2022-10-22 14:00:00'),
(2, 220.00, 'Alice Lee', '2022-10-26 16:00:00'),
(3, 180.00, 'Robert Brown', '2022-11-02 11:00:00'),
(4, 110.00, 'Emily Adams', '2022-11-11 10:00:00'),
(5, 90.00, 'David Kim', '2022-11-16 15:00:00'),
(6, 320.00, 'Sarah Wong', '2022-11-21 12:00:00'),
(7, 270.00, 'Michael Chen', '2022-11-27 11:00:00'),
(8, 80.00, 'Karen Miller', '2022-12-03 14:00:00'),
(9, 60.00, 'Alex Taylor', '2022-12-11 13:00:00');
