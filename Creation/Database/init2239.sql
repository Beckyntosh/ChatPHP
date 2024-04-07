CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE coupons (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    coupon_code VARCHAR(20) NOT NULL
);

INSERT INTO users (email, password) VALUES ('john@example.com', 'password123');
INSERT INTO users (email, password) VALUES ('alice@example.com', 'securepwd345');
INSERT INTO users (email, password) VALUES ('bob@example.com', 'test1234');
INSERT INTO users (email, password) VALUES ('emma@example.com', 'passtest456');
INSERT INTO users (email, password) VALUES ('sam@example.com', 'password789');
INSERT INTO users (email, password) VALUES ('laura@example.com', 'testpass2021');
INSERT INTO users (email, password) VALUES ('mark@example.com', 'abc123pwd');
INSERT INTO users (email, password) VALUES ('susan@example.com', 'securepass567');
INSERT INTO users (email, password) VALUES ('chris@example.com', 'pass123abc');
INSERT INTO users (email, password) VALUES ('kate@example.com', 'katepwd2021');

INSERT INTO coupons (email, coupon_code) VALUES ('john@example.com', 'WELCOMEabcd');
INSERT INTO coupons (email, coupon_code) VALUES ('alice@example.com', 'WELCOMEefgh');
INSERT INTO coupons (email, coupon_code) VALUES ('bob@example.com', 'WELCOMEijkl');
INSERT INTO coupons (email, coupon_code) VALUES ('emma@example.com', 'WELCOMEmnop');
INSERT INTO coupons (email, coupon_code) VALUES ('sam@example.com', 'WELCOMEqrst');
INSERT INTO coupons (email, coupon_code) VALUES ('laura@example.com', 'WELCOMEuvwx');
INSERT INTO coupons (email, coupon_code) VALUES ('mark@example.com', 'WELCOMEyz12');
INSERT INTO coupons (email, coupon_code) VALUES ('susan@example.com', 'WELCOME34cd');
INSERT INTO coupons (email, coupon_code) VALUES ('chris@example.com', 'WELCOME56ef');
INSERT INTO coupons (email, coupon_code) VALUES ('kate@example.com', 'WELCOME78gh');
