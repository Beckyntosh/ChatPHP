CREATE TABLE IF NOT EXISTS paint_calculations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    room_name VARCHAR(30) NOT NULL,
    length DECIMAL(5,2) NOT NULL,
    width DECIMAL(5,2) NOT NULL,
    height DECIMAL(5,2) NOT NULL,
    coats INT(5) NOT NULL,
    paint_needed DECIMAL(10,2) NOT NULL,
    calculation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES ('Living Room', 5.25, 4.75, 3.0, 2, 23.75);
INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES ('Kitchen', 3.5, 3.0, 2.5, 1, 17.50);
INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES ('Bedroom 1', 4.0, 4.0, 2.75, 2, 22.00);
INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES ('Bathroom', 2.5, 2.0, 2.0, 1, 7.50);
INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES ('Home Office', 4.75, 3.25, 2.5, 2, 29.88);
INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES ('Dining Room', 6.0, 4.25, 3.0, 1, 25.50);
INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES ('Hallway', 10.0, 3.0, 2.0, 1, 50.00);
INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES ('Guest Room', 3.75, 3.0, 2.75, 2, 23.25);
INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES ('Basement', 8.5, 5.75, 3.25, 1, 55.25);
INSERT INTO paint_calculations (room_name, length, width, height, coats, paint_needed) VALUES ('Study', 3.25, 2.75, 2.0, 1, 16.88);
