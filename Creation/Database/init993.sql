CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    hotel VARCHAR(255),
    attraction VARCHAR(255),
    review TEXT NOT NULL,
    rating INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES ('Paris', 'Luxury Hotel', 'Eiffel Tower', 'Amazing city with rich history', 5);
INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES ('Tokyo', 'Modern Hotel', 'Shibuya Crossing', 'Incredible food and culture', 4);
INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES ('Rome', 'Family Hotel', 'Colosseum', 'Beautiful architecture and art', 5);
INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES ('Bali', 'Beach Resort', 'Ubud Monkey Forest', 'Relaxing and picturesque', 4);
INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES ('New York City', 'Boutique Hotel', 'Statue of Liberty', 'Vibrant and diverse city', 5);
INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES ('Dubai', 'Luxury Resort', 'Burj Khalifa', 'Modern and luxurious destination', 4);
INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES ('Barcelona', 'Budget Hotel', 'Park Guell', 'Artistic and lively city', 4);
INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES ('Sydney', 'Waterfront Hotel', 'Sydney Opera House', 'Breathtaking views and culture', 5);
INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES ('Santorini', 'Cliffside Hotel', 'Oia Sunset Views', 'Romantic getaway with stunning sunsets', 5);
INSERT INTO reviews (destination, hotel, attraction, review, rating) VALUES ('Cape Town', 'Safari Lodge', 'Table Mountain', 'Adventure and natural beauty', 4);
