CREATE TABLE IF NOT EXISTS calculations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    length INT NOT NULL,
    width INT NOT NULL,
    height INT NOT NULL,
    coats INT NOT NULL,
    totalPaint INT NOT NULL
);

INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (5, 3, 2, 3, 150);
INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (7, 4, 3, 2, 140);
INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (10, 2, 2, 1, 60);
INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (8, 3, 2, 4, 180);
INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (6, 5, 2, 2, 130);
INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (12, 4, 3, 1, 120);
INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (9, 3, 2, 3, 150);
INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (4, 6, 2, 2, 140);
INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (11, 4, 3, 4, 240);
INSERT INTO calculations (length, width, height, coats, totalPaint) VALUES (6, 7, 3, 1, 120);
