CREATE TABLE IF NOT EXISTS UserNotifications (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
order_updates BOOLEAN DEFAULT 1,
promotional_emails BOOLEAN DEFAULT 1,
new_product_info BOOLEAN DEFAULT 1,
reg_date TIMESTAMP
);

INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES ('user1@example.com', 1, 0, 1);
INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES ('user2@example.com', 1, 1, 0);
INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES ('user3@example.com', 0, 1, 1);
INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES ('user4@example.com', 1, 1, 1);
INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES ('user5@example.com', 0, 0, 0);
INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES ('user6@example.com', 1, 0, 0);
INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES ('user7@example.com', 0, 1, 0);
INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES ('user8@example.com', 1, 0, 1);
INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES ('user9@example.com', 0, 1, 1);
INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES ('user10@example.com', 1, 1, 1);
