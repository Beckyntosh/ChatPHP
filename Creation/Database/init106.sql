CREATE TABLE IF NOT EXISTS TravelItinerary (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination VARCHAR(50) NOT NULL,
  accommodation VARCHAR(50),
  activities TEXT,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES ('Paris', 'Hotel ABC', 'Sightseeing, shopping');
INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES ('New York', 'Apartment XYZ', 'Museum visit, Central Park');
INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES ('Tokyo', 'Ryokan 123', 'Sushi making class, temples visits');
INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES ('Sydney', 'Hostel 789', 'Beach day, opera house tour');
INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES ('Rio de Janeiro', 'Resort LMN', 'Carnival parade, Sugarloaf Mountain hike');
INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES ('Barcelona', 'Airbnb DEF', 'Gaudi architecture, tapas tasting');
INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES ('Cape Town', 'B&B QRS', 'Safari, Table Mountain hike');
INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES ('Dubai', 'Luxury Hotel WXY', 'Desert safari, shopping at the mall');
INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES ('Bali', 'Villa ZZZ', 'Yoga retreat, beach relaxation');
INSERT INTO TravelItinerary (destination, accommodation, activities) VALUES ('Amsterdam', 'Houseboat 456', 'Bike tour, Anne Frank House visit');