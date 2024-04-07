CREATE TABLE IF NOT EXISTS Members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    registration_date TIMESTAMP
);

INSERT INTO Members (username, password, email) VALUES ('john_doe', '$2y$10$2X7gQ.q66aLFlXlj1qKoMuRQCo155H/QbQ.Fb7dTX963NUPYwQtAe', 'john_doe@example.com');
INSERT INTO Members (username, password, email) VALUES ('jane_smith', '$2y$10$6a0Tk920jRQmIOakayvDiuk3wCiXa8C/4tJdUlHywLLB5BNIufw9G', 'jane_smith@example.com');
INSERT INTO Members (username, password, email) VALUES ('bob_jackson', '$2y$10$UtTuj4uLJHC74Fz8n5z3i.ofzLRpVGi8vwNlc8uFvDPIsw1hYFR.S', 'bob_jackson@example.com');
INSERT INTO Members (username, password, email) VALUES ('susan_brown', '$2y$10$f4KKXC5YqT1mjGMZpBTCHOMrzJ1jzfg7Hw4nKf4Sbt0K4P0O6eubC', 'susan_brown@example.com');
INSERT INTO Members (username, password, email) VALUES ('michael_adams', '$2y$10$oEnsU1Hy2PpeVWp1tIt9IOJ7tnx0.53RkMlG7I9wQdVvXwTtORlMG', 'michael_adams@example.com');
INSERT INTO Members (username, password, email) VALUES ('emily_clark', '$2y$10$sKruWhJisfPzWWcAnGQKNenBoj7v3NZaqj6xq1cEn.DuBG7zePBRG', 'emily_clark@example.com');
INSERT INTO Members (username, password, email) VALUES ('adam_miller', '$2y$10$Tz1xwC0xIPQtFqge6Bc7.OieUHba.94Y/CN4DDkp0rWvAE3RU63Bm', 'adam_miller@example.com');
INSERT INTO Members (username, password, email) VALUES ('olivia_wilson', '$2y$10$rqYc5jbE7DUOre8YF1V9meHq1wmM/RNolq8N1aDlm7eQZcOvTr.ns', 'olivia_wilson@example.com');
INSERT INTO Members (username, password, email) VALUES ('charlie_thomas', '$2y$10$a7RKOUVggcmRFy4TCuI3zOrIl0L0wFPxvLmDgyBGYUr5v5izjq5Lu', 'charlie_thomas@example.com');
INSERT INTO Members (username, password, email) VALUES ('lily_lee', '$2y$10$UEBLNtGWFOhOMKU/6MlQ2OTHcbZqkQMHgfv.1p2q4xME8WqSOsonS', 'lily_lee@example.com');
