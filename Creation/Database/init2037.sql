CREATE TABLE IF NOT EXISTS email_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    newsletter BOOL DEFAULT 1,
    product_updates BOOL DEFAULT 1,
    custom_notifications BOOL DEFAULT 1,
    reg_date TIMESTAMP
);

INSERT INTO email_preferences (email, newsletter, product_updates, custom_notifications)
VALUES ('user1@example.com', 1, 0, 1),
       ('user2@example.com', 0, 1, 0),
       ('user3@example.com', 1, 1, 0),
       ('user4@example.com', 0, 0, 1),
       ('user5@example.com', 1, 1, 1),
       ('user6@example.com', 0, 1, 1),
       ('user7@example.com', 1, 0, 0),
       ('user8@example.com', 1, 0, 1),
       ('user9@example.com', 0, 1, 1),
       ('user10@example.com', 1, 1, 1);
