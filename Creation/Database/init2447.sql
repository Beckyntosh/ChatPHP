CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE,
    google_id VARCHAR(255) UNIQUE,
    name VARCHAR(255)
);

INSERT INTO users (email, google_id, name) VALUES ('test1@gmail.com', '1234', 'Test User 1');
INSERT INTO users (email, google_id, name) VALUES ('test2@gmail.com', '5678', 'Test User 2');
INSERT INTO users (email, google_id, name) VALUES ('test3@gmail.com', '91011', 'Test User 3');
INSERT INTO users (email, google_id, name) VALUES ('test4@gmail.com', '121314', 'Test User 4');
INSERT INTO users (email, google_id, name) VALUES ('test5@gmail.com', '151617', 'Test User 5');
INSERT INTO users (email, google_id, name) VALUES ('test6@gmail.com', '181920', 'Test User 6');
INSERT INTO users (email, google_id, name) VALUES ('test7@gmail.com', '212223', 'Test User 7');
INSERT INTO users (email, google_id, name) VALUES ('test8@gmail.com', '242526', 'Test User 8');
INSERT INTO users (email, google_id, name) VALUES ('test9@gmail.com', '272829', 'Test User 9');
INSERT INTO users (email, google_id, name) VALUES ('test10@gmail.com', '303132', 'Test User 10');
