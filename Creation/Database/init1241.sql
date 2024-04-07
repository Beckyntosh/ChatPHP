CREATE TABLE IF NOT EXISTS travel_plan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT,
    hotel_details TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO travel_plan (destination, departure_date, return_date, flight_details, hotel_details) VALUES 
('Paris', '2023-08-15', '2023-08-20', 'Flight: ABC123, Seat: 1A', 'Hotel: XYZ Hotel, Room: Suite'),
('Tokyo', '2023-09-10', '2023-09-15', 'Flight: DEF456, Seat: 2B', 'Hotel: ABC Hotel, Room: Standard'),
('London', '2023-10-05', '2023-10-10', 'Flight: GHI789, Seat: 3C', 'Hotel: PQR Hotel, Room: Deluxe'),
('New York', '2023-11-20', '2023-11-25', 'Flight: JKL012, Seat: 4D', 'Hotel: MNO Hotel, Room: Executive'),
('Berlin', '2023-12-15', '2023-12-20', 'Flight: MNO345, Seat: 5E', 'Hotel: STU Hotel, Room: Economy'),
('Sydney', '2024-01-10', '2024-01-15', 'Flight: PQR678, Seat: 6F', 'Hotel: VWX Hotel, Room: Ocean View'),
('Rome', '2024-02-05', '2024-02-10', 'Flight: STU901, Seat: 7G', 'Hotel: YZA Hotel, Room: Suite'),
('Barcelona', '2024-03-20', '2024-03-25', 'Flight: VWX234, Seat: 8H', 'Hotel: BCD Hotel, Room: Standard'),
('Dubai', '2024-04-15', '2024-04-20', 'Flight: YZA567, Seat: 9I', 'Hotel: CDE Hotel, Room: Deluxe'),
('Cancun', '2024-05-10', '2024-05-15', 'Flight: BCD890, Seat: 10J', 'Hotel: DEF Hotel, Room: Executive');