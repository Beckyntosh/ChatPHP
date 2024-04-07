CREATE TABLE IF NOT EXISTS subscribers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        subscription_date DATE,
        subscription_status VARCHAR(50),
        FOREIGN KEY (user_id) REFERENCES users(id)
    );

INSERT INTO subscribers (user_id, subscription_date, subscription_status) VALUES (1, '2023-01-01', 'Active');
INSERT INTO subscribers (user_id, subscription_date, subscription_status) VALUES (2, '2023-02-15', 'Active');
INSERT INTO subscribers (user_id, subscription_date, subscription_status) VALUES (3, '2023-03-20', 'Inactive');
INSERT INTO subscribers (user_id, subscription_date, subscription_status) VALUES (4, '2023-04-10', 'Active');
INSERT INTO subscribers (user_id, subscription_date, subscription_status) VALUES (5, '2023-05-05', 'Inactive');
INSERT INTO subscribers (user_id, subscription_date, subscription_status) VALUES (6, '2023-06-30', 'Active');
INSERT INTO subscribers (user_id, subscription_date, subscription_status) VALUES (7, '2023-07-11', 'Active');
INSERT INTO subscribers (user_id, subscription_date, subscription_status) VALUES (8, '2023-08-22', 'Inactive');
INSERT INTO subscribers (user_id, subscription_date, subscription_status) VALUES (9, '2023-09-17', 'Active');
INSERT INTO subscribers (user_id, subscription_date, subscription_status) VALUES (10, '2023-10-25', 'Active');
