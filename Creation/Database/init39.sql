CREATE TABLE IF NOT EXISTS lost_found_items (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    location VARCHAR(100) NOT NULL,
    image VARCHAR(100) NOT NULL,
    date_lost_found DATE,
    item_status ENUM('lost', 'found') NOT NULL
);

INSERT INTO lost_found_items (name, description, location, image, date_lost_found, item_status) VALUES
('Keys', 'Set of keys found near the park', 'Park', 'keys.jpg', '2022-01-15', 'found'),
('Watch', 'Lost wristwatch with leather band', 'Shopping Mall', 'watch.jpg', '2022-01-10', 'lost'),
('Phone', 'Black smartphone found on the bus', 'Public Transport', 'phone.jpg', '2022-01-05', 'found'),
('Sunglasses', 'Lost aviator sunglasses at the beach', 'Beach', 'sunglasses.jpg', '2022-01-20', 'lost'),
('Wallet', 'Brown leather wallet found at the cafe', 'Cafe', 'wallet.jpg', '2022-01-18', 'found'),
('Camera', 'Lost digital camera at the concert hall', 'Concert Hall', 'camera.jpg', '2022-01-12', 'lost'),
('Bag', 'Pink shoulder bag found in the park', 'Park', 'bag.jpg', '2022-01-25', 'found'),
('Laptop', 'Lost silver laptop at the airport', 'Airport', 'laptop.jpg', '2022-01-08', 'lost'),
('Book', 'Hardcover book found in the library', 'Library', 'book.jpg', '2022-01-22', 'found'),
('Glasses', 'Lost prescription glasses at the office', 'Office', 'glasses.jpg', '2022-01-14', 'lost');
