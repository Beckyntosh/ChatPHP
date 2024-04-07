CREATE TABLE IF NOT EXISTS travel_plans (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(30) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_info TEXT,
    hotel_info TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO travel_plans (destination, departure_date, return_date, flight_info, hotel_info) VALUES 
('Paris', '2022-08-15', '2022-08-20', 'Flight: ABC123, Seat: 10A', 'Hotel: XYZ Hotel, Room: Suite'),
('London', '2022-09-10', '2022-09-15', 'Flight: DEF456, Seat: 5B', 'Hotel: ABC Hotel, Room: Standard'),
('Tokyo', '2023-01-05', '2023-01-10', 'Flight: GHI789, Seat: 20C', 'Hotel: QWE Hotel, Room: Deluxe'),
('New York', '2023-03-20', '2023-03-25', 'Flight: JKL012, Seat: 15D', 'Hotel: ZXC Hotel, Room: Executive'),
('Sydney', '2023-06-12', '2023-06-17', 'Flight: MNO345, Seat: 8E', 'Hotel: POI Hotel, Room: Suite'),
('Rome', '2023-09-28', '2023-10-03', 'Flight: RST678, Seat: 12F', 'Hotel: KJH Hotel, Room: Standard'),
('Barcelona', '2024-02-14', '2024-02-19', 'Flight: UVW901, Seat: 25G', 'Hotel: LKJ Hotel, Room: Deluxe'),
('Dubai', '2024-05-03', '2024-05-08', 'Flight: XYZ234, Seat: 6H', 'Hotel: HGF Hotel, Room: Suites'),
('Berlin', '2024-08-19', '2024-08-24', 'Flight: CDE567, Seat: 18I', 'Hotel: AZS Hotel, Room: Deluxe'),
('Madrid', '2025-01-10', '2025-01-15', 'Flight: BNM890, Seat: 30J', 'Hotel: QWE Hotel, Room: Standard');