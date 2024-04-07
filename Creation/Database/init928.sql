CREATE TABLE IF NOT EXISTS user_cookies (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    cookie_data TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)  ENGINE=INNODB;

INSERT INTO user_cookies (username, cookie_data) VALUES ('Alice', 'YWxpY2U6ZXJyb3I6bXBsKDEyODA3OTgxNzQ2NjM=');
INSERT INTO user_cookies (username, cookie_data) VALUES ('Bob', 'Qm9iOmVycm9yOm1wbCgxMjgwNzk4MTc2NDM=');
INSERT INTO user_cookies (username, cookie_data) VALUES ('Charlie', 'Q2hhcmxleTpzZXJ2ZXI6bXBsKDEyODA3OTg0MzIwMzc=');
INSERT INTO user_cookies (username, cookie_data) VALUES ('David', 'RGF2aWQ6ZXJyb3I6bXBsKDEyODA3OTg2MDE0NTM=');
INSERT INTO user_cookies (username, cookie_data) VALUES ('Eve', 'RXZlOmVycm9yOm1wbCgxMjgwNzk4NjU2NjA=');
INSERT INTO user_cookies (username, cookie_data) VALUES ('Frank', 'RnJhbmstTG91aXM6ZXJyb3I6bXBsKDEyODA3OTg3MzI4NzA=');
INSERT INTO user_cookies (username, cookie_data) VALUES ('Grace', 'R3JhY2U6c2VydmVyOm1wbCgxMjgwNzk4NzcxNzY3=');
INSERT INTO user_cookies (username, cookie_data) VALUES ('Hannah', 'SGFubmFoOmVycm9yOm1wbCgxMjgwNzk4ODAwMzQ0=');
INSERT INTO user_cookies (username, cookie_data) VALUES ('Ian', 'SWFuOmVycm9yOm1wbCgxMjgwNzk4ODIxMzc4=');