CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(70) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS coupons (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    coupon_code VARCHAR(20) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (email, password) VALUES ('user1@example.com', '$2y$10$jLFvEaeDo0CAoMDFoYffIOZ32lSOfPa/qTIRQfZc1gdaU1Aby2mn6');
INSERT INTO users (email, password) VALUES ('user2@example.com', '$2y$10$3Fb4CRc7J5qqYXxrSLqy2eJDtUyKGh8PO.AVwiw3gWDudrwMN3KAi');
INSERT INTO users (email, password) VALUES ('user3@example.com', '$2y$10$FNh1u32qY7uyLRKKPIaS.eURi1CSuzcn2Lfjo.QrYO9wVzvOfdM6y');
INSERT INTO users (email, password) VALUES ('user4@example.com', '$2y$10$Lqielc.3Qq5RFjcgP0UYz..8V8Lq31b9twZpZQgRkCZbepT1Hbth6');
INSERT INTO users (email, password) VALUES ('user5@example.com', '$2y$10$G3HlxK5rUnu2J0jHlzmL4umQ3yiLSEPa2/98t9jUa.X8oEvc5MiVO');
INSERT INTO users (email, password) VALUES ('user6@example.com', '$2y$10$g5hdI8deKSs4PJ.GqjVfPuIzKkBiDLJpWqdBXIBz1l0NX/adlWDUu');
INSERT INTO users (email, password) VALUES ('user7@example.com', '$2y$10$i8TCVS5hJN7XZJtBNCJ93.ZVW.7kP5hg9ShOBGcqhB4sF8v/ty5lq');
INSERT INTO users (email, password) VALUES ('user8@example.com', '$2y$10$Wq9y0eEn.Cuc6qdoDMwTxuSKe/kygjEI4VyAW1leZeEIoQr8uqMgK');
INSERT INTO users (email, password) VALUES ('user9@example.com', '$2y$10$ZMbIOLY2oW/ZWygVZzNKJO3IAZKSHQ3B3z0FnnXy7l6MRlXeN9xk2');
INSERT INTO users (email, password) VALUES ('user10@example.com', '$2y$10$I29cbFAiNnSCJNE46cruceeKI2ZFyT.eVlWV70Jfi72TAwG/A4DjK');

INSERT INTO coupons (user_id, coupon_code) VALUES (1, 'WELCOME10');
INSERT INTO coupons (user_id, coupon_code) VALUES (2, 'WELCOME10');
INSERT INTO coupons (user_id, coupon_code) VALUES (3, 'WELCOME10');
INSERT INTO coupons (user_id, coupon_code) VALUES (4, 'WELCOME10');
INSERT INTO coupons (user_id, coupon_code) VALUES (5, 'WELCOME10');
INSERT INTO coupons (user_id, coupon_code) VALUES (6, 'WELCOME10');
INSERT INTO coupons (user_id, coupon_code) VALUES (7, 'WELCOME10');
INSERT INTO coupons (user_id, coupon_code) VALUES (8, 'WELCOME10');
INSERT INTO coupons (user_id, coupon_code) VALUES (9, 'WELCOME10');
INSERT INTO coupons (user_id, coupon_code) VALUES (10, 'WELCOME10');
