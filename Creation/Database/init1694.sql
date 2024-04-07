CREATE TABLE IF NOT EXISTS payment_methods (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED NOT NULL,
    card_data VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO payment_methods (user_id, card_data) VALUES (1, 'encrypted_card_data_1');
INSERT INTO payment_methods (user_id, card_data) VALUES (2, 'encrypted_card_data_2');
INSERT INTO payment_methods (user_id, card_data) VALUES (3, 'encrypted_card_data_3');
INSERT INTO payment_methods (user_id, card_data) VALUES (4, 'encrypted_card_data_4');
INSERT INTO payment_methods (user_id, card_data) VALUES (5, 'encrypted_card_data_5');
INSERT INTO payment_methods (user_id, card_data) VALUES (6, 'encrypted_card_data_6');
INSERT INTO payment_methods (user_id, card_data) VALUES (7, 'encrypted_card_data_7');
INSERT INTO payment_methods (user_id, card_data) VALUES (8, 'encrypted_card_data_8');
INSERT INTO payment_methods (user_id, card_data) VALUES (9, 'encrypted_card_data_9');
INSERT INTO payment_methods (user_id, card_data) VALUES (10, 'encrypted_card_data_10');
