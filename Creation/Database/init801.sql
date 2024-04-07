
CREATE TABLE IF NOT EXISTS coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    code VARCHAR(255) NOT NULL,
    discount DECIMAL(5, 2) NOT NULL,
    validity DATE NOT NULL
);

INSERT INTO coupons (code, discount, validity) VALUES ('CODE1', 10.00, '2022-12-31');
INSERT INTO coupons (code, discount, validity) VALUES ('CODE2', 15.00, '2022-11-30');
INSERT INTO coupons (code, discount, validity) VALUES ('CODE3', 25.00, '2022-10-31');
INSERT INTO coupons (code, discount, validity) VALUES ('CODE4', 30.00, '2022-09-30');
INSERT INTO coupons (code, discount, validity) VALUES ('CODE5', 12.50, '2022-08-31');
INSERT INTO coupons (code, discount, validity) VALUES ('CODE6', 18.75, '2022-07-31');
INSERT INTO coupons (code, discount, validity) VALUES ('CODE7', 20.00, '2022-06-30');
INSERT INTO coupons (code, discount, validity) VALUES ('CODE8', 22.50, '2022-05-31');
INSERT INTO coupons (code, discount, validity) VALUES ('CODE9', 17.50, '2022-04-30');
INSERT INTO coupons (code, discount, validity) VALUES ('CODE10', 28.00, '2022-03-31');