CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255),
    is_member BOOLEAN DEFAULT FALSE,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    points INT(6) DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

INSERT INTO users (firstname, lastname, email, password, is_member, reg_date) VALUES ('Alice', 'Smith', 'alice@example.com', '$2y$10$C8Q2QLOlVxuf.MKCaSx52OMYyskvMbOscBUOSYU9Yo.zE3BUxLkCq', 1, NOW());
INSERT INTO users (firstname, lastname, email, password, is_member, reg_date) VALUES ('Bob', 'Johnson', 'bob@example.com', '$2y$10$MYhQ2A74gS1FsWYPmot8Te8g8NvnVsQkef9YUrcmFJELchuMIvF9G', 0, NOW());
INSERT INTO users (firstname, lastname, email, password, is_member, reg_date) VALUES ('Charlie', 'Brown', 'charlie@example.com', '$2y$10$hSIJn1w3d4qvyF9V2QPp7.38IQILzS4Yxf.dzc5m6PNkrmQjPwsKK', 1, NOW());
INSERT INTO users (firstname, lastname, email, password, is_member, reg_date) VALUES ('David', 'Lee', 'david@example.com', '$2y$10$USzbtBVDGw.hLnukPe2EBuDqoiZIrFvGWdxvw5X1oA4EqQ1n/6VGm', 1, NOW());
INSERT INTO users (firstname, lastname, email, password, is_member, reg_date) VALUES ('Emma', 'Garcia', 'emma@example.com', '$2y$10$q6ZEaTLkAD6/KZ1LcB11heVXYLPoQVxfhUKLi2Dp3lw048j2RiPvm', 0, NOW());
INSERT INTO users (firstname, lastname, email, password, is_member, reg_date) VALUES ('Frank', 'Martinez', 'frank@example.com', '$2y$10$RbfXGKP4ySk06GZvcMF48uYkXewmRQ1U1be3IaB7l8qKlDqFR1CR.', 1, NOW());
INSERT INTO users (firstname, lastname, email, password, is_member, reg_date) VALUES ('Grace', 'Nguyen', 'grace@example.com', '$2y$10$YTTdKlQv4dheAcJZ8Wj3muFKzq9QjbKljFe4vDuG2KODi7S23ak62', 0, NOW());
INSERT INTO users (firstname, lastname, email, password, is_member, reg_date) VALUES ('Henry', 'Adams', 'henry@example.com', '$2y$10$ojTaAF76BmZI.djHFx8WDuXn43Fq9bMm7Y6RTQr57UVMVfULfzQfe', 1, NOW());
INSERT INTO users (firstname, lastname, email, password, is_member, reg_date) VALUES ('Isabel', 'Clark', 'isabel@example.com', '$2y$10$J1Uxy7LN5vlRlfh0uBxEze1JL.8pg5eXsbXVnx7BC5Z52HoG0HAMI', 1, NOW());
INSERT INTO users (firstname, lastname, email, password, is_member, reg_date) VALUES ('Jack', 'Evans', 'jack@example.com', '$2y$10$6B8I1sG2G0mrwKwoYYxxpei9b8KFsD7NRKFuOGxrAxOWkDV.nMyme', 0, NOW());

INSERT INTO members (user_id, points) VALUES (1, 50);
INSERT INTO members (user_id, points) VALUES (3, 75);
INSERT INTO members (user_id, points) VALUES (4, 100);
INSERT INTO members (user_id, points) VALUES (6, 25);
INSERT INTO members (user_id, points) VALUES (8, 150);
