CREATE TABLE IF NOT EXISTS forum_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    email VARCHAR(50) UNIQUE,
    password VARCHAR(255),
    interest_in_art ENUM('painting', 'sculpting', 'drawing') DEFAULT 'painting',
    join_date TIMESTAMP,
    privacy ENUM('public', 'private') DEFAULT 'private'
);

INSERT INTO forum_users (username, email, password, interest_in_art, privacy) VALUES 
('user1', 'user1@example.com', '$2y$10$QhM9RtVrnALl7sKaYzm4neA6Tv1vf4BbQZxI6queP/ScPmxs632Ea', 'painting', 'private'),
('user2', 'user2@example.com', '$2y$10$JL8nzaY9TdA9bPLUzDMk5OdT04zytmImdxd2pH55y8d/2SLPfnAb6', 'drawing', 'public'),
('user3', 'user3@example.com', '$2y$10$QhM9RtVrnALl7sKaYzm4neA6Tv1vf4BbQZxI6queP/ScPmxs632Ea', 'sculpting', 'private'),
('user4', 'user4@example.com', '$2y$10$JL8nzaY9TdA9bPLUzDMk5OdT04zytmImdxd2pH55y8d/2SLPfnAb6', 'painting', 'public'),
('user5', 'user5@example.com', '$2y$10$QhM9RtVrnALl7sKaYzm4neA6Tv1vf4BbQZxI6queP/ScPmxs632Ea', 'drawing', 'private'),
('user6', 'user6@example.com', '$2y$10$JL8nzaY9TdA9bPLUzDMk5OdT04zytmImdxd2pH55y8d/2SLPfnAb6', 'sculpting', 'public'),
('user7', 'user7@example.com', '$2y$10$QhM9RtVrnALl7sKaYzm4neA6Tv1vf4BbQZxI6queP/ScPmxs632Ea', 'painting', 'private'),
('user8', 'user8@example.com', '$2y$10$JL8nzaY9TdA9bPLUzDMk5OdT04zytmImdxd2pH55y8d/2SLPfnAb6', 'drawing', 'public'),
('user9', 'user9@example.com', '$2y$10$QhM9RtVrnALl7sKaYzm4neA6Tv1vf4BbQZxI6queP/ScPmxs632Ea', 'sculpting', 'private'),
('user10', 'user10@example.com', '$2y$10$JL8nzaY9TdA9bPLUzDMk5OdT04zytmImdxd2pH55y8d/2SLPfnAb6', 'painting', 'public');