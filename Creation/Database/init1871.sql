CREATE TABLE IF NOT EXISTS user_profiles (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    favorite_brand VARCHAR(50) NOT NULL,
    budget VARCHAR(10) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES ('Alice', 'Dell', '$1000');
INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES ('Bob', 'Apple', '$1500');
INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES ('Charlie', 'HP', '$800');
INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES ('David', 'Lenovo', '$1200');
INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES ('Eve', 'Asus', '$900');
INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES ('Frank', 'HP', '$1000');
INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES ('Grace', 'Dell', '$1300');
INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES ('Henry', 'Apple', '$1100');
INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES ('Ivy', 'Lenovo', '$1400');
INSERT INTO user_profiles (fullname, favorite_brand, budget) VALUES ('Jack', 'Asus', '$950');
