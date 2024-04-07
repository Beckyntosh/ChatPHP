CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    preferences TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password, preferences) VALUES ('user1', 'user1@example.com', '$2y$10$X/upf5GDO8JXq2gJzJnqzuEVv2FYCY0oLgf4m6BtEQiF2Iv2wIa4O', '{"sports":"Sports","technology":"Technology"}');
INSERT INTO users (username, email, password, preferences) VALUES ('user2', 'user2@example.com', '$2y$10$nAUSztSiHwarE1WChrvXhuHJlexoJsJLnHtNL8.c7qeRLE27zfXPK', '{"entertainment":"Entertainment"}');
INSERT INTO users (username, email, password, preferences) VALUES ('user3', 'user3@example.com', '$2y$10$GkadAZH8lGx45N1P7RWxCCyAvJdBMD5Q2ptWruarSHd8CEtPDlxlm', '{"sports":"Sports","entertainment":"Entertainment"}');
INSERT INTO users (username, email, password, preferences) VALUES ('user4', 'user4@example.com', '$2y$10$5.p7AShORqa3txJZRztvu.TMNMGIu8HxuMsfRdZVfD6NpHrAX49Aa', '{"technology":"Technology"}');
INSERT INTO users (username, email, password, preferences) VALUES ('user5', 'user5@example.com', '$2y$10$RZufQkRahJ9kuITSOq9qt.DQeHQ6D2MjcuITMBKoxpckIJabeBdqu', '{"sports":"Sports","technology":"Technology","entertainment":"Entertainment"}');
INSERT INTO users (username, email, password, preferences) VALUES ('user6', 'user6@example.com', '$2y$10$uKujHs/UHjFAyYvT2VB9jeUq9Mvo.kvZvQM.iVckOPAr3hBLfboY2', '{"technology":"Technology"}');
INSERT INTO users (username, email, password, preferences) VALUES ('user7', 'user7@example.com', '$2y$10$odAm7JbYSXeBWtB7.T4V2.01T6qaze2Byc1epULsR2mZz7mC8OSf2', '{"sports":"Sports","entertainment":"Entertainment"}');
INSERT INTO users (username, email, password, preferences) VALUES ('user8', 'user8@example.com', '$2y$10$rK/BI49fyF0xiDzFenTlN.ZhjLUGkAv949m0algF1lHF80b1Mmi1m', '{"sports":"Sports"}');
INSERT INTO users (username, email, password, preferences) VALUES ('user9', 'user9@example.com', '$2y$10$LkJb1cFB4oisK.O5bbhG/uSQE8JNBZmuw8UlNaxLpRHRF1kW2z1M6', '{"technology":"Technology","entertainment":"Entertainment"}');
INSERT INTO users (username, email, password, preferences) VALUES ('user10', 'user10@example.com', '$2y$10$cIWBPrWqk9xwPsLyiIfk5.HWGMA9QmWDyVF4jH176sLHOEUUw7ev2', '{"entertainment":"Entertainment"}');
