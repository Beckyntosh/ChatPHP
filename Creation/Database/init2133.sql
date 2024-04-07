CREATE TABLE IF NOT EXISTS wishlist (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    userId INT(6) UNSIGNED,
    medicineName VARCHAR(255) NOT NULL,
    addedDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO wishlist (userId, medicineName) VALUES (1, 'Paracetamol');
INSERT INTO wishlist (userId, medicineName) VALUES (2, 'Aspirin');
INSERT INTO wishlist (userId, medicineName) VALUES (3, 'Loratadine');
INSERT INTO wishlist (userId, medicineName) VALUES (4, 'Ibuprofen');
INSERT INTO wishlist (userId, medicineName) VALUES (5, 'Cetirizine');
INSERT INTO wishlist (userId, medicineName) VALUES (6, 'Omeprazole');
INSERT INTO wishlist (userId, medicineName) VALUES (7, 'Acetaminophen');
INSERT INTO wishlist (userId, medicineName) VALUES (8, 'Diphenhydramine');
INSERT INTO wishlist (userId, medicineName) VALUES (9, 'Lansoprazole');
INSERT INTO wishlist (userId, medicineName) VALUES (10, 'Fexofenadine');
