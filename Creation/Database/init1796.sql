CREATE TABLE payment_methods (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    card_number VARCHAR(255),
    expiry_date VARCHAR(255),
    cvv VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO payment_methods (user_id, card_number, expiry_date, cvv)
VALUES (1, 'encrypted_card_number_1', 'encrypted_expiry_date_1', 'encrypted_cvv_1'),
    (2, 'encrypted_card_number_2', 'encrypted_expiry_date_2', 'encrypted_cvv_2'),
    (3, 'encrypted_card_number_3', 'encrypted_expiry_date_3', 'encrypted_cvv_3'),
    (4, 'encrypted_card_number_4', 'encrypted_expiry_date_4', 'encrypted_cvv_4'),
    (5, 'encrypted_card_number_5', 'encrypted_expiry_date_5', 'encrypted_cvv_5'),
    (6, 'encrypted_card_number_6', 'encrypted_expiry_date_6', 'encrypted_cvv_6'),
    (7, 'encrypted_card_number_7', 'encrypted_expiry_date_7', 'encrypted_cvv_7'),
    (8, 'encrypted_card_number_8', 'encrypted_expiry_date_8', 'encrypted_cvv_8'),
    (9, 'encrypted_card_number_9', 'encrypted_expiry_date_9', 'encrypted_cvv_9'),
    (10, 'encrypted_card_number_10', 'encrypted_expiry_date_10', 'encrypted_cvv_10');