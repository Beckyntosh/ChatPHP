CREATE TABLE IF NOT EXISTS paint_calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    length FLOAT NOT NULL,
    width FLOAT NOT NULL,
    height FLOAT NOT NULL,
    coats INT NOT NULL,
    paint_needed FLOAT NOT NULL,
    calculation_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (3.5, 4.2, 2.1, 2, 19.6);
INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (5.7, 3.8, 2.5, 3, 24.3);
INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (4.0, 5.0, 3.0, 2, 30.0);
INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (6.2, 3.5, 2.4, 2, 18.9);
INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (3.0, 4.0, 2.8, 3, 25.2);
INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (5.5, 4.5, 2.6, 2, 23.1);
INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (4.8, 3.2, 2.2, 4, 20.5);
INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (3.6, 3.9, 2.7, 2, 22.5);
INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (4.3, 2.9, 3.3, 3, 24.3);
INSERT INTO paint_calculations (length, width, height, coats, paint_needed) VALUES (5.1, 3.4, 2.5, 2, 20.4);