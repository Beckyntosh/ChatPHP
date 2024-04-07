CREATE TABLE IF NOT EXISTS routes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mode_of_transport VARCHAR(30) NOT NULL,
    start_point VARCHAR(50),
    end_point VARCHAR(50),
    time TIME,
    cost DECIMAL(10, 2),
    accessibility_options VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO routes (mode_of_transport, start_point, end_point, time, cost, accessibility_options, reg_date) VALUES
('bus', 'A', 'B', '10:00:00', 5.00, 'Wheelchair accessible', NOW()),
('train', 'C', 'D', '12:30:00', 10.50, 'Ramp available', NOW()),
('bus', 'E', 'F', '14:45:00', 3.75, 'Elevator available', NOW()),
('subway', 'G', 'H', '16:20:00', 2.50, 'Step-free access', NOW()),
('bus', 'I', 'J', '18:00:00', 4.50, 'Accessible seating', NOW()),
('train', 'K', 'L', '20:10:00', 12.75, 'Priority boarding', NOW()),
('subway', 'M', 'N', '22:30:00', 1.95, 'Audible announcements', NOW()),
('bus', 'O', 'P', '23:45:00', 7.20, 'Assistance dogs allowed', NOW()),
('bus', 'Q', 'R', '09:15:00', 6.80, 'Low floor buses', NOW()),
('train', 'S', 'T', '11:40:00', 15.25, 'Braille signage', NOW());
