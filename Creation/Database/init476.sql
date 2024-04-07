CREATE TABLE IF NOT EXISTS paint_calculations (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
room_width FLOAT NOT NULL,
room_length FLOAT NOT NULL,
room_height FLOAT NOT NULL,
coats INT NOT NULL,
total_paint_needed FLOAT,
reg_date TIMESTAMP
);

INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (10, 12, 8, 2, 1.71);
INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (15, 10, 9, 3, 2.98);
INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (8, 8, 7, 1, 1.42);
INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (14, 12, 10, 2, 2.84);
INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (16, 11, 7, 3, 3.03);
INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (9, 10, 8, 2, 1.85);
INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (12, 15, 9, 1, 2.13);
INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (18, 14, 11, 3, 3.98);
INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (20, 16, 12, 2, 5.69);
INSERT INTO paint_calculations (room_width, room_length, room_height, coats, total_paint_needed) VALUES (11, 13, 8, 1, 2.32);