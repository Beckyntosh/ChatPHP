CREATE TABLE IF NOT EXISTS transport_modes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mode_name VARCHAR(30) NOT NULL,
    accessibility_options VARCHAR(50),
    UNIQUE KEY unique_mode (mode_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS routes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    start_point VARCHAR(50) NOT NULL,
    end_point VARCHAR(50) NOT NULL,
    mode_id INT(6) UNSIGNED NOT NULL,
    duration INT NOT NULL,
    cost DECIMAL(5,2) UNSIGNED,
    departure_time DATETIME NOT NULL,
    FOREIGN KEY (mode_id) REFERENCES transport_modes(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO transport_modes (mode_name, accessibility_options) VALUES 
('Bus', 'Wheelchair Accessible'),
('Subway', 'Elevator Access'),
('Train', 'Ramp Accessible'),
('Tram', 'Step-Free Access'),
('Ferry', 'Limited Accessibility'),
('Taxi', 'Accessible with Assistance'),
('Bicycle', 'Not Accessible'),
('Walking', 'Fully Accessible'),
('Car', 'Varies by Vehicle'),
('Motorbike', 'Helmet Required');

INSERT INTO routes (start_point, end_point, mode_id, duration, cost, departure_time) VALUES
('A', 'B', 1, 30, 2.50, NOW()),
('B', 'C', 2, 20, 3.00, NOW()),
('C', 'D', 3, 45, 5.75, NOW()),
('D', 'E', 4, 15, 1.50, NOW()),
('E', 'F', 5, 60, 7.00, NOW()),
('F', 'G', 6, 25, 10.25, NOW()),
('G', 'H', 7, 40, 4.50, NOW()),
('H', 'I', 8, 35, 9.00, NOW()),
('I', 'J', 9, 55, 6.75, NOW()),
('J', 'K', 10, 10, 1.00, NOW());
