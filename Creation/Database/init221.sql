CREATE TABLE IF NOT EXISTS toy_sales (
    id INT AUTO_INCREMENT PRIMARY KEY,
    toy_name VARCHAR(255) NOT NULL,
    quantity_sold INT NOT NULL,
    sale_date DATE NOT NULL
);

INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES ('Barbie Doll', 100, '2021-10-15');
INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES ('LEGO Set', 75, '2021-10-16');
INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES ('Hot Wheels Cars', 120, '2021-10-17');
INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES ('Nerf Gun', 90, '2021-10-18');
INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES ('Board Game', 50, '2021-10-19');
INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES ('Play-Doh Kit', 80, '2021-10-20');
INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES ('Puzzle', 60, '2021-10-21');
INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES ('Teddy Bear', 110, '2021-10-22');
INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES ('Robot Toy', 70, '2021-10-23');
INSERT INTO toy_sales (toy_name, quantity_sold, sale_date) VALUES ('Remote Control Car', 85, '2021-10-24');
