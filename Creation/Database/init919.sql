CREATE TABLE IF NOT EXISTS encrypted_emails (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
subject VARCHAR(50) NOT NULL,
message TEXT NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO encrypted_emails (email, subject, message) VALUES ('user1@example.com', 'Promotion Details', 'Congratulations on your recent purchase!');
INSERT INTO encrypted_emails (email, subject, message) VALUES ('user2@example.com', 'Account Update', 'Your account information has been successfully updated.');
INSERT INTO encrypted_emails (email, subject, message) VALUES ('user3@example.com', 'Special Offer', 'You have been selected for an exclusive discount!');
INSERT INTO encrypted_emails (email, subject, message) VALUES ('user4@example.com', 'Feedback Request', 'We would love to hear about your experience with us.');
INSERT INTO encrypted_emails (email, subject, message) VALUES ('user5@example.com', 'New Product Launch', 'Check out our latest collection now available!');
INSERT INTO encrypted_emails (email, subject, message) VALUES ('user6@example.com', 'Important Notice', 'Please review the updated terms and conditions.');
INSERT INTO encrypted_emails (email, subject, message) VALUES ('user7@example.com', 'Event Invitation', 'You are invited to our annual furniture showcase.');
INSERT INTO encrypted_emails (email, subject, message) VALUES ('user8@example.com', 'Order Confirmation', 'Your order has been confirmed and is on its way.');
INSERT INTO encrypted_emails (email, subject, message) VALUES ('user9@example.com', 'Account Security Alert', 'A recent login was detected from an unrecognized device.');
INSERT INTO encrypted_emails (email, subject, message) VALUES ('user10@example.com', 'Holiday Sale', 'Don't miss out on our limited-time holiday discounts!');
