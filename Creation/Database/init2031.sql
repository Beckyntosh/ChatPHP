CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    image VARCHAR(100),
    REG_date TIMESTAMP
);

INSERT INTO products (name, description, image) VALUES ('iPhone 13', 'Description for iPhone 13', 'image_url_iphone');
INSERT INTO products (name, description, image) VALUES ('Samsung Galaxy S21', 'Description for Samsung Galaxy S21', 'image_url_samsung');
INSERT INTO products (name, description, image) VALUES ('Google Pixel 6', 'Description for Google Pixel 6', 'image_url_pixel');
INSERT INTO products (name, description, image) VALUES ('Sony Xperia 1 III', 'Description for Sony Xperia 1 III', 'image_url_sony');
INSERT INTO products (name, description, image) VALUES ('OnePlus 9 Pro', 'Description for OnePlus 9 Pro', 'image_url_oneplus');
INSERT INTO products (name, description, image) VALUES ('Xiaomi Mi 11 Ultra', 'Description for Xiaomi Mi 11 Ultra', 'image_url_xiaomi');
INSERT INTO products (name, description, image) VALUES ('Huawei P50 Pro', 'Description for Huawei P50 Pro', 'image_url_huawei');
INSERT INTO products (name, description, image) VALUES ('LG V60 ThinQ', 'Description for LG V60 ThinQ', 'image_url_lg');
INSERT INTO products (name, description, image) VALUES ('Motorola Edge Plus', 'Description for Motorola Edge Plus', 'image_url_motorola');
INSERT INTO products (name, description, image) VALUES ('Nokia 9 PureView', 'Description for Nokia 9 PureView', 'image_url_nokia');
