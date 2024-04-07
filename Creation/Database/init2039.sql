CREATE TABLE IF NOT EXISTS Products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
brand VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
);

INSERT INTO Products (productName, description, brand) VALUES ('iPhone 13', 'Latest model of iPhone 13', 'Apple');
INSERT INTO Products (productName, description, brand) VALUES ('Samsung Galaxy S21', 'Latest model of Samsung S21', 'Samsung');
INSERT INTO Products (productName, description, brand) VALUES ('Canon EOS R5', 'Professional mirrorless camera', 'Canon');
INSERT INTO Products (productName, description, brand) VALUES ('Nikon Z7 II', 'High-resolution mirrorless camera', 'Nikon');
INSERT INTO Products (productName, description, brand) VALUES ('Sony Alpha 7 IV', 'Full-frame mirrorless camera', 'Sony');
INSERT INTO Products (productName, description, brand) VALUES ('Fujifilm X-T4', 'Mirrorless camera with great colors', 'Fujifilm');
INSERT INTO Products (productName, description, brand) VALUES ('Panasonic Lumix GH5', '4K mirrorless camera', 'Panasonic');
INSERT INTO Products (productName, description, brand) VALUES ('Olympus OM-D E-M1 Mark III', 'Micro Four Thirds camera', 'Olympus');
INSERT INTO Products (productName, description, brand) VALUES ('Leica SL2', 'Luxury full-frame camera', 'Leica');
INSERT INTO Products (productName, description, brand) VALUES ('Pentax K-1 Mark II', 'Weather-sealed DSLR camera', 'Pentax');
