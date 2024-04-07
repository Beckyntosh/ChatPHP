CREATE TABLE paint_calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    width INT NOT NULL,
    length INT NOT NULL,
    height INT NOT NULL,
    coats INT NOT NULL,
    paint_needed DECIMAL(10,2) NOT NULL
);

INSERT INTO paint_calculations (width, length, height, coats, paint_needed) VALUES
(12, 10, 8, 2, 1.71),
(15, 12, 9, 1, 1.29),
(10, 8, 6, 3, 2.57),
(20, 15, 10, 2, 3.43),
(8, 6, 4, 1, 0.86),
(18, 14, 12, 2, 2.86),
(16, 12, 10, 1, 2.00),
(14, 11, 8, 3, 2.43),
(22, 18, 15, 2, 4.29),
(12, 9, 7, 1, 1.00);
