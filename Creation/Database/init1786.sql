CREATE TABLE IF NOT EXISTS email_preferences (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    order_updates BOOLEAN NOT NULL DEFAULT 1,
    newsletter BOOLEAN NOT NULL DEFAULT 1,
    personalized_ads BOOLEAN NOT NULL DEFAULT 1
);

INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES (1, 1, 1, 1);
INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES (2, 0, 1, 0);
INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES (3, 1, 0, 1);
INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES (4, 1, 1, 0);
INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES (5, 0, 0, 1);
INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES (6, 1, 0, 0);
INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES (7, 0, 1, 1);
INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES (8, 1, 1, 1);
INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES (9, 0, 0, 0);
INSERT INTO email_preferences (user_id, order_updates, newsletter, personalized_ads) VALUES (10, 1, 1, 0);
