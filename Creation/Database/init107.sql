CREATE TABLE travel_itinerary (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    accommodation VARCHAR(255) NOT NULL,
    activities TEXT NOT NULL
);

INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES ('New York', 'Hotel ABC', 'Sightseeing, Broadway shows');
INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES ('Paris', 'Airbnb in City Center', 'Eiffel Tower, Louvre Museum');
INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES ('Tokyo', 'Ryokan in Shibuya', 'Visit temples, try sushi');
INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES ('London', 'Luxury Hotel in Mayfair', 'British Museum, Buckingham Palace');
INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES ('Sydney', 'Beachfront Resort', 'Surfing, Sydney Opera House tour');
INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES ('Rome', 'Historic Villa in Tuscany', 'Colosseum, Vatican City');
INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES ('Cape Town', 'Safari Lodge in Kruger National Park', 'Wildlife safari, Table Mountain hike');
INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES ('Dubai', 'Luxury Desert Camp', 'Shopping in Dubai Mall, Desert safari');
INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES ('Rio de Janeiro', 'Beachfront Hotel in Copacabana', 'Carnival, Sugarloaf Mountain');
INSERT INTO travel_itinerary (destination, accommodation, activities) VALUES ('Barcelona', 'Boutique Hotel in Gothic Quarter', 'Sagrada Familia, Tapas tour');
