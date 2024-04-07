CREATE TABLE IF NOT EXISTS HairCareProducts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(50) NOT NULL,
productType VARCHAR(30) NOT NULL,
keyIngredient VARCHAR(50),
price DECIMAL(10, 2) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO HairCareProducts (productName, productType, keyIngredient, price) VALUES ('Shampoo A', 'Shampoo', 'Aloe Vera', 10.99);
INSERT INTO HairCareProducts (productName, productType, keyIngredient, price) VALUES ('Conditioner B', 'Conditioner', 'Argan Oil', 12.50);
INSERT INTO HairCareProducts (productName, productType, keyIngredient, price) VALUES ('Hair Serum C', 'Hair Serum', 'Coconut Oil', 15.75);
INSERT INTO HairCareProducts (productName, productType, keyIngredient, price) VALUES ('Hair Mask D', 'Hair Mask', 'Shea Butter', 18.99);
INSERT INTO HairCareProducts (productName, productType, keyIngredient, price) VALUES ('Hair Oil E', 'Hair Oil', 'Jojoba Oil', 20.25);
INSERT INTO HairCareProducts (productName, productType, keyIngredient, price) VALUES ('Hair Gel F', 'Hair Styling', 'Keratin', 8.99);
INSERT INTO HairCareProducts (productName, productType, keyIngredient, price) VALUES ('Hairspray G', 'Hair Styling', 'Vitamin E', 9.75);
INSERT INTO HairCareProducts (productName, productType, keyIngredient, price) VALUES ('Hair Wax H', 'Hair Styling', 'Beeswax', 11.99);
INSERT INTO HairCareProducts (productName, productType, keyIngredient, price) VALUES ('Hair Cream I', 'Hair Styling', 'Argan Oil', 14.50);
INSERT INTO HairCareProducts (productName, productType, keyIngredient, price) VALUES ('Hair Mousse J', 'Hair Styling', 'Hyaluronic Acid', 16.25);