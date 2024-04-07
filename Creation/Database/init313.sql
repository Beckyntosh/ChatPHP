CREATE TABLE IF NOT EXISTS user_notification_settings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    promotion BOOLEAN NOT NULL DEFAULT 1,
    new_product BOOLEAN NOT NULL DEFAULT 1,
    reminder BOOLEAN NOT NULL DEFAULT 1,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('john@example.com', 1, 0, 1);
INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('mary@example.com', 0, 1, 1);
INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('alex@example.com', 1, 1, 0);
INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('sarah@example.com', 0, 0, 1);
INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('james@example.com', 1, 1, 1);
INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('emily@example.com', 0, 1, 0);
INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('chris@example.com', 1, 0, 1);
INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('laura@example.com', 1, 1, 0);
INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('michael@example.com', 0, 0, 1);
INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('sophia@example.com', 1, 1, 1);