CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        password VARCHAR(255),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (name, email, password) VALUES 
('John Doe', 'johndoe@example.com', '$2y$10$hnSE9QfmEg3JoWjxVAWrg.LrKbPtb4.DUVY0QqZVZVBHqeqh5Xt2S'),
('Jane Smith', 'janesmith@example.com', '$2y$10$o1wnr9Mh.NQjJBDuBN8J0ej9s6JQzKmsF2NKRC0BQN689kFqeH42m'),
('Alice Johnson', 'alicejohnson@example.com', '$2y$10$3kKZW7h0prblHBdFqh1ag.UQEAY/zj7kNlIKyPcVpj2gQ.DQz0ptO'),
('Mike Brown', 'mikebrown@example.com', '$2y$10$k19NzFBvF/oaGn7cV83c5.MgY1z9w0nEm5WY.DQ4TbRJw9lAyrRUK'),
('Sarah Adams', 'sarahadams@example.com', '$2y$10$XY49gP/wIhId3fAQkXWct.zOePAebgLIFcFaO7sabxnXkgY1MyG0O'),
('David Lee', 'davidlee@example.com', '$2y$10$2pzLmxddfE7HnZUh/YM.E.ppugbW21cwINp/D5cN6TEB8kauF24Gi'),
('Karen Wilson', 'karenwilson@example.com', '$2y$10$89rhVLyHi/i3cBaCSVz.F.PAFV9aJ3COqXDcYYmnJInHWNsR7/QNi'),
('Tom Roberts', 'tomroberts@example.com', '$2y$10$t1dxjzlsyzlJQ8lwhI9IfO2pcWUbMEcf7Aioy2vBp4xa08z1LcMpa'),
('Jennifer Chang', 'jenniferchang@example.com', '$2y$10$YV4Z7JKF5dy8zwie1vuVzOWVnyeuWzYO5pA9vKXGwJwustqPkJH1K'),
('Kevin Nguyen', 'kevinnguyen@example.com', '$2y$10$NXKs8j.vRSk8uU7T4X68x.nJwvherrYLqVJpLVpOjiI0Qnwab8n7G');
