CREATE TABLE IF NOT EXISTS travel_itinerary (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(30) NOT NULL,
accommodations VARCHAR(100) NOT NULL,
activities TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES ('Paris', 'Hotel ABC', 'Eiffel Tower, Louvre Museum');
INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES ('Tokyo', 'Ryokan XYZ', 'Shibuya Crossing, Tokyo Disney');
INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES ('New York', 'Apartment DEF', 'Central Park, Times Square');
INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES ('Sydney', 'Hostel GHI', 'Sydney Opera House, Bondi Beach');
INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES ('Rome', 'Bed and Breakfast JKL', 'Colosseum, Vatican City');
INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES ('Cancun', 'Resort MNO', 'Chichen Itza, Tulum');
INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES ('Cape Town', 'Luxury Villa PQR', 'Table Mountain, Robben Island');
INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES ('Dubai', 'Five-Star Hotel STU', 'Burj Khalifa, Desert Safari');
INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES ('Lisbon', 'Boutique Hotel VWX', 'Belem Tower, Pastéis de Belém');
INSERT INTO travel_itinerary (destination, accommodations, activities) VALUES ('Bali', 'Private Villa YZA', 'Ubud Monkey Forest, Tanah Lot Temple');
