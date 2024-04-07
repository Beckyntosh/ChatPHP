CREATE TABLE IF NOT EXISTS Products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP
);

INSERT INTO Products (name, description) VALUES ('iPhone 13', 'Apple iPhone 13 smartphone');
INSERT INTO Products (name, description) VALUES ('Samsung Galaxy S21', 'Samsung Galaxy S21 smartphone');
INSERT INTO Products (name, description) VALUES ('Google Pixel 5', 'Google Pixel 5 smartphone');
INSERT INTO Products (name, description) VALUES ('OnePlus 9 Pro', 'OnePlus 9 Pro smartphone');
INSERT INTO Products (name, description) VALUES ('Xiaomi Mi 11', 'Xiaomi Mi 11 smartphone');
INSERT INTO Products (name, description) VALUES ('Huawei P40 Pro', 'Huawei P40 Pro smartphone');
INSERT INTO Products (name, description) VALUES ('Sony Xperia 1 II', 'Sony Xperia 1 II smartphone');
INSERT INTO Products (name, description) VALUES ('LG V60 ThinQ', 'LG V60 ThinQ smartphone');
INSERT INTO Products (name, description) VALUES ('Motorola Edge+', 'Motorola Edge+ smartphone');
INSERT INTO Products (name, description) VALUES ('Nokia 8.3 5G', 'Nokia 8.3 5G smartphone');