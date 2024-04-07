CREATE TABLE IF NOT EXISTS vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    model VARCHAR(255) NOT NULL,
    maintenance_date DATE NOT NULL,
    usage_count INT DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO vehicles (name, model, maintenance_date, usage_count) VALUES
('Car1', 'Toyota', '2023-05-15', 100),
('Car2', 'Honda', '2023-06-20', 80),
('Truck1', 'Ford', '2023-04-10', 120),
('SUV1', 'Chevrolet', '2023-07-25', 90),
('Van1', 'Nissan', '2023-08-30', 70),
('Motorcycle1', 'Harley Davidson', '2023-09-05', 60),
('Car3', 'BMW', '2023-03-12', 110),
('Truck2', 'Dodge', '2023-02-28', 130),
('SUV2', 'Jeep', '2023-01-18', 140),
('Van2', 'Kia', '2023-11-08', 50);
