CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
email VARCHAR(50),
reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', '$2y$10$Hl46WOMX9zH9xFBOUuQhH.ceTa.LPvq/WE1xC1.CWAkFYDEnmr8UW', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', '$2y$10$bdGtAm3v7l0j9aSvmIjmPurRgiVZlfVoC2gThoEusDkin3sM./TaC', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('michael_johnson', '$2y$10$Hg5vZvoHhc9lO3HlJOL9aeXCN9fn7z1f20ExKMU69Ka7rtDXylkL2', 'michael.johnson@example.com');
INSERT INTO users (username, password, email) VALUES ('sarah_clark', '$2y$10$agWrVR4xAA19P1qQSO1W5O5aqyHUv5nzBNWVAJbiAN843puYxpjGi', 'sarah.clark@example.com');
INSERT INTO users (username, password, email) VALUES ('david_williams', '$2y$10$JRHHCCE1WmzQoeMJC/qACOkS4fDBH1wv3j.NzkDpyv9AwOqVj4f9G', 'david.williams@example.com');
INSERT INTO users (username, password, email) VALUES ('emily_baker', '$2y$10$5WEL3iXvnijMFjQiQNszKOJrd0kgLwVQK/ZFsvXhJwCuKzhRKSsWi', 'emily.baker@example.com');
INSERT INTO users (username, password, email) VALUES ('adam_anderson', '$2y$10$lK28oQm/rL..8oAwzvgwpe2uAbrE1dRrP1iAzilO8QqX/43ZPURZO', 'adam.anderson@example.com');
INSERT INTO users (username, password, email) VALUES ('olivia_miller', '$2y$10$xzVgmgF/THIuWQxiDcbx8eHdV7OAN8zEgNNsFP7f81bJvRa3A5c72', 'olivia.miller@example.com');
INSERT INTO users (username, password, email) VALUES ('ethan_thomas', '$2y$10$3DgUCOvmmPA7Lv1yUqoAKuugRx2KJZAI/JmdeC1P7tFjsAcTvYfNy', 'ethan.thomas@example.com');
INSERT INTO users (username, password, email) VALUES ('sophia_adams', '$2y$10$85ATllHMyPitAFKSKOoIJer.9aDSUQG5BAljpmFNkWXH4ywzqpt/S', 'sophia.adams@example.com');