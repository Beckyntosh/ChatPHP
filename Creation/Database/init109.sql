CREATE TABLE IF NOT EXISTS itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    accommodations VARCHAR(255),
    activities VARCHAR(255),
    travel_date DATE,
    return_date DATE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO itinerary (destination, accommodations, activities, travel_date, return_date)
VALUES ('Paris', 'Hotel ABC', 'Eiffel Tower Tour', '2022-09-15', '2022-09-20'),
       ('Tokyo', 'Apartment XYZ', 'Visit Shibuya', '2022-10-10', '2022-10-15'),
       ('New York', 'Airbnb 123', 'Broadway Show', '2022-11-05', '2022-11-10'),
       ('London', 'Hotel DEF', 'London Eye', '2022-12-01', '2022-12-06'),
       ('Sydney', 'Resort MNO', 'Bondi Beach', '2023-01-20', '2023-01-25'),
       ('Rome', 'Hostel PQR', 'Colosseum Visit', '2023-02-14', '2023-02-19'),
       ('Dubai', 'Luxury Hotel XYZ', 'Desert Safari', '2023-03-09', '2023-03-14'),
       ('Cancun', 'Beach Resort ABC', 'Mayan Ruins Tour', '2023-04-10', '2023-04-15'),
       ('Barcelona', 'Boutique Hotel KLM', 'Sagrada Familia', '2023-05-18', '2023-05-23'),
       ('Cape Town', 'Guest House HIJ', 'Table Mountain Hike', '2023-06-22', '2023-06-27');
