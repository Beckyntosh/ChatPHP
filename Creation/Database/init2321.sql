
CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    date DATE NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', '$2y$10$SIr3Figinj44.QAu3YtiDOhrOD5jKTbH8M0NFASs/vHH3UEi3bVSP', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', '$2y$10$w8v3JAtUrukGmE/MSurWYourxSv0bVpg47s2gbwxgHTHJTvB1zc3K', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('bob_jones', '$2y$10$saTLvh4d7WXw.DHrH7vjb.2ykz3LsjCuBtm03M1JxIHUCEZZP6Aki', 'bob.jones@example.com');
INSERT INTO users (username, password, email) VALUES ('lisa_davis', '$2y$10$9SbBnPUrFiN6PA4ffcNOCe4PZf7tEw8M5wGQLOs5ZvT8Njhsq4bSy', 'lisa.davis@example.com');
INSERT INTO users (username, password, email) VALUES ('mike_jackson', '$2y$10$USTU4nCCJZJHkiZuqwfj6.afKLvj2Tlnbq5sTYAmI/zykQayZ2o7q', 'mike.jackson@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah_miller', '$2y$10$RL5PZ7v076H7Kid9d3QqtuijjMrZTGT42q99ECbVeamN5wFF5uN5C', 'sarah.miller@example.com');
INSERT INTO users (username, password, email) VALUES ('adam_wilson', '$2y$10$unX06Ez3vSxO4zvXsFeJG.FzdwS5hUrXyJyUim6AMry5UaGua4yhu', 'adam.wilson@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_thompson', '$2y$10$VihQ.MwaK2KTLZg/tKzTge1lLgG0eqGWuZtUhBW2tjJVPJdaadOiy', 'emily.thompson@example.com');
INSERT INTO users (username, password, email) VALUES ('chris_roberts', '$2y$10$altnj.AzGS6ftyIt.ssozeSw5jJfaO.7LcyoOS5Lx5sw7M5DoXj2m', 'chris.roberts@example.com');
INSERT INTO users (username, password, email) VALUES ('laura_hall', '$2y$10$dcAgyimk7cS9u9pGUKbSy.882c3N/qp8Wl8ZxPgOQj9qJFuCV9U7e', 'laura.hall@example.com');
