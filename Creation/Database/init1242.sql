CREATE TABLE IF NOT EXISTS travelPlans (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  destination VARCHAR(30) NOT NULL,
  departure_date DATE NOT NULL,
  return_date DATE NOT NULL,
  flight_details TEXT NOT NULL,
  hotel_details TEXT NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO travelPlans (destination, departure_date, return_date, flight_details, hotel_details) 
VALUES ('Paris', '2022-08-15', '2022-08-20', 'Flight: ABC123, Seat: 22A', 'Hotel: XYZ Hotel, Room: Suite'),
('London', '2022-09-10', '2022-09-15', 'Flight: DEF456, Seat: 15F', 'Hotel: ABC Inn, Room: Standard'),
('Rome', '2022-10-05', '2022-10-10', 'Flight: GHI789, Seat: 10B', 'Hotel: QWE Resort, Room: Deluxe'),
('Tokyo', '2022-11-20', '2022-11-25', 'Flight: JKL012, Seat: 5C', 'Hotel: RTY Lodge, Room: Superior'),
('New York', '2023-01-15', '2023-01-20', 'Flight: MNO345, Seat: 18D', 'Hotel: UIO Towers, Room: Executive'),
('Sydney', '2023-03-08', '2023-03-13', 'Flight: PQR678, Seat: 7A', 'Hotel: ASD Mansion, Room: Penthouse'),
('Barcelona', '2023-04-25', '2023-04-30', 'Flight: STU901, Seat: 21E', 'Hotel: FGH Resort, Room: Ocean View'),
('Dubai', '2023-06-10', '2023-06-15', 'Flight: VWX234, Seat: 12C', 'Hotel: HJK Palace, Room: Royal Suite'),
('Cancun', '2023-08-05', '2023-08-10', 'Flight: YZA567, Seat: 8F', 'Hotel: LOP Paradise, Room: Beachfront'),
('Bali', '2023-09-20', '2023-09-25', 'Flight: BCD890, Seat: 3B', 'Hotel: ZXC Resort, Room: Garden Villa');
