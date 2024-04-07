CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
coupon_code VARCHAR(50) NOT NULL
);

INSERT INTO Users (fullname, email, password, coupon_code) VALUES ('John Doe', 'johndoe@example.com', '$2y$10$3yv3DYQvMdkO9lvduFVpcOxGcUhPTOcjyO0uTWBBur.ABCU5uEBG2', 'WELCOME10');
INSERT INTO Users (fullname, email, password, coupon_code) VALUES ('Jane Smith', 'janesmith@example.com', '$2y$10$FQ5U7OR.wk18noknbvKxkuAzgvGL8u4t4lj8VuGut8K2A1OeMIpsG', 'FUTURE20');
INSERT INTO Users (fullname, email, password, coupon_code) VALUES ('Alice Johnson', 'alicejohnson@example.com', '$2y$10$6S/V40WJBesemQ9an082Ru14060k/SqjtSe7Kf2YC1HPKWUt7UWAO', 'HAIRCARE15');
INSERT INTO Users (fullname, email, password, coupon_code) VALUES ('Bob Brown', 'bobbrown@example.com', '$2y$10$.x7W4h0ZvBMIL02KsLwRROn/Z1Qoh0XkggCrwkVSVkE8Z.4ENZNGS', 'SAVE25');
INSERT INTO Users (fullname, email, password, coupon_code) VALUES ('Emily Davis', 'emilydavis@example.com', '$2y$10$7fN68DW7HX8ZWG5kq1IjdeTzYi2THHO6D4E1b0eZrwbO.wMB/XTNu', 'BEAUTY25');
INSERT INTO Users (fullname, email, password, coupon_code) VALUES ('Michael Wilson', 'michaelwilson@example.com', '$2y$10$OtI9Nvj4Lp87iFHeZL/lZOxAjGH176apO1HkBxIHuSZcuXyEv45PW', 'CARE15');
INSERT INTO Users (fullname, email, password, coupon_code) VALUES ('Sarah Lee', 'sarahlee@example.com', '$2y$10$MibgZpQG5K5HsIqwQ8xUzusynCa.O4VlJFaReFwACY0DHLfiRKKzS', 'SHOP10');
INSERT INTO Users (fullname, email, password, coupon_code) VALUES ('David Clark', 'davidclark@example.com', '$2y$10$5tiHA3zgkdVS3alppVQsGujl9FZuKUcAJyVyK5G5IEa2YyWm5Y1Fu', 'DISCOUNT20');
INSERT INTO Users (fullname, email, password, coupon_code) VALUES ('Linda Martinez', 'lindamartinez@example.com', '$2y$10$JhZzU9YTy2QeaXidBkEHqunQap749Whq8b2UW4m1l3sTkIQ/2hWuu', 'SPECIAL30');
INSERT INTO Users (fullname, email, password, coupon_code) VALUES ('Chris Adams', 'chrisadams@example.com', '$2y$10$XCDCMc4FGwb0yZo86nsCb.fnqAFin6kxIR.aNn033nDZUarJJNpUq', 'SAVEMORE');
