CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (id, username, password, reg_date) VALUES
(1, 'john_doe', '$2y$10$yKJ7ZtC5RM.4BykjB7e4iO0en.U0IzU1IgE8adkedIz3V0Vjq/MCG', '2022-01-01 00:00:00'),
(2, 'jane_smith', '$2y$10$YHDdQkqpmiDZOjd8z1IxeO2.wnuWp7f3hJwGR60Am/z7GKp5jC9gG', '2022-01-02 00:00:00'),
(3, 'mike_jones', '$2y$10$v1bT.aDzdkmWos1rbiEvwubRQfPZdd9OX2xSO6j9yCR8Y5k1GJ1Nu', '2022-01-03 00:00:00'),
(4, 'sara_adams', '$2y$10$rB9.qP23CpTZfLnlQvz7DuM/0ogzHd2GzazaLBW0PAl5QauItNJee', '2022-01-04 00:00:00'),
(5, 'chris_wilson', '$2y$10$5Zie5P9jmYWmQ5LqwIVM9uvKlQRqBE3agIJiEyT8VVKQ1VbiJ4wby', '2022-01-05 00:00:00'),
(6, 'amanda_brown', '$2y$10$XaPZd/8YvLHBoCUw/PfNGuA6w6CZuhz8JRxN85yaiqEOC1./7WejW', '2022-01-06 00:00:00'),
(7, 'kevin_clark', '$2y$10$K7t2zOay0bN.pEA8L1NOpekvX/aqN8qg.T8f4/awz.Yw.GIuFBEu2', '2022-01-07 00:00:00'),
(8, 'lisa_green', '$2y$10$lyOl3Zj7BkO66j4UObWfGuVbge6N4zpQUz7jRmbsVTxqdTFe91anu', '2022-01-08 00:00:00'),
(9, 'alex_hall', '$2y$10$KUPlzZ7eQyR1aKaYTuVJq.Dr.vlWYGWNs4oQD2iaV02kB.hC1wi7S', '2022-01-09 00:00:00'),
(10, 'emily_miller', '$2y$10$SYDYibrkA9smoEXff9qkS.Setb5s/bDDQceumarLe.lsOC6R6sJJy', '2022-01-10 00:00:00');
