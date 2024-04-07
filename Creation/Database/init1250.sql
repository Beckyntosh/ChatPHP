CREATE TABLE IF NOT EXISTS travel_plans (
    id INT AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(255) NOT NULL,
    departure_date DATE NOT NULL,
    return_date DATE NOT NULL,
    flight_details TEXT,
    hotel_details TEXT
);

INSERT INTO travel_plans (destination, departure_date, return_date, flight_details, hotel_details) VALUES 
('Paris', '2022-07-15', '2022-07-20', 'Flight: XYZ123, Seat: 24F', 'Hotel: ABC Hotel, Room: Deluxe Suite'),
('London', '2022-08-10', '2022-08-15', 'Flight: QWE456, Seat: 12B', 'Hotel: DEF Hotel, Room: Standard'),
('Tokyo', '2022-09-05', '2022-09-12', 'Flight: ASD789, Seat: 36C', 'Hotel: GHI Hotel, Room: Executive'),
('New York', '2022-10-20', '2022-10-25', 'Flight: ZXC321, Seat: 8A', 'Hotel: JKL Hotel, Room: Penthouse'),
('Sydney', '2022-11-15', '2022-11-20', 'Flight: MNB654, Seat: 18D', 'Hotel: OPQ Hotel, Room: Ocean View'),
('Dubai', '2023-01-02', '2023-01-07', 'Flight: POI852, Seat: 4F', 'Hotel: RST Hotel, Room: Suite'),
('Rome', '2023-02-18', '2023-02-23', 'Flight: KJH753, Seat: 22B', 'Hotel: UVW Hotel, Room: Superior'),
('Barcelona', '2023-03-12', '2023-03-17', 'Flight: EDF147, Seat: 30C', 'Hotel: XYZ Hotel, Room: Standard'),
('Hong Kong', '2023-04-28', '2023-05-03', 'Flight: WER369, Seat: 15A', 'Hotel: IOP Hotel, Room: City View'),
('Berlin', '2023-06-10', '2023-06-15', 'Flight: QAZ852, Seat: 10D', 'Hotel: FGH Hotel, Room: Business');
