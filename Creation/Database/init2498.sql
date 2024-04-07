CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Insert 10 values into USERS table
INSERT INTO users (username, password, email) VALUES ('sherlock', '$2y$10$3nAy.lVWrDrYqV6Q/Ka4NuR9zlhLqfEzMkOTYsl/sxo11QIK5uklO', 'sherlock@example.com');
INSERT INTO users (username, password, email) VALUES ('watson', '$2y$10$R4c8T1w0M0zVvFE9f0ZDoeLVrCU6O1sWfKEXok/dnnxO4V8B0h9zK', 'watson@example.com');
INSERT INTO users (username, password, email) VALUES ('moriarty', '$2y$10$9lRv17Xjkzxqt7CJ8QhOWeQa2mvx8.iHeFRw.zp2ch8eVXUz/MjAC', 'moriarty@example.com');
INSERT INTO users (username, password, email) VALUES ('adler', '$2y$10$Wlf6GvbqC4Ix2Qa55H/NYOheChZRi.SrnvDfXL5jqS3a2GY2Q.x7C', 'adler@example.com');
INSERT INTO users (username, password, email) VALUES ('lestrade', '$2y$10$F.TqIECH7o6XmN/jNVnrIOqgV1cHr3myFtJqFTP8NVp7vR9lYUIxK', 'lestrade@example.com');
INSERT INTO users (username, password, email) VALUES ('irene', '$2y$10$2OX7ahXqQG5AKP4Bn8nKd.cmlFjsXFqlFzNHYDQkBfVVqtk68w9Ba', 'irene@example.com');
INSERT INTO users (username, password, email) VALUES ('gregson', '$2y$10$OyH6E6L3aD1pjUiGIlyzC.JYY8e1JW3Hcvd4sFVjPd5BEw/ZmmgdC', 'gregson@example.com');
INSERT INTO users (username, password, email) VALUES ('hooper', '$2y$10$ovelYVso50wYPA8cXGn.wurD3RwiIkDi8s7N8l8XrU3jae9qysKmC', 'hooper@example.com');
INSERT INTO users (username, password, email) VALUES ('mary', '$2y$10$XuI8Rbi4cRCHXPbVs7qEIu8Cq/8nW1hDkR1w/IBw5rUB/gfpIYDmC', 'mary@example.com');
INSERT INTO users (username, password, email) VALUES ('mycroft', '$2y$10$6GcKDUoxFrfvFz6stj2wn.j0DJiFuZxFf5VLUwCYK4P1 TrHTgFm2', 'mycroft@example.com');
