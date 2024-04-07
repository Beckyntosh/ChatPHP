CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    trial_start_date DATE,
    trial_end_date DATE
);

INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES ('john_doe', 'john.doe@example.com', '$2y$10$U7htlXa6XW7qcG1WTOi/Y.GUpxUylzKYYrXsmHnxJ7eQFg0QlF9jS', '2023-10-01', '2023-11-01');
INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES ('jane_smith', 'jane.smith@example.com', '$2y$10$p/Is4HEfRy09yNfg853cUuVOeVrsWzYMkidPbXYFvhbTmNeH8bCQW', '2023-10-03', '2023-11-03');
INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES ('mike_wilson', 'mike.wilson@example.com', '$2y$10$byV7d3x.gmwEzMg3PhYmXutLgM5LTmOuBF7AWFlCeJw3ecyfOd9M6', '2023-10-05', '2023-11-05');
INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES ('sara_jackson', 'sara.jackson@example.com', '$2y$10$T9trSJIljRPNRi3nthHsBOlBQjhg7wCp.P/lCIomjl1ENlGVDUYX.', '2023-10-07', '2023-11-07');
INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES ('adam_white', 'adam.white@example.com', '$2y$10$g4k7Kd8fiy9pjMoNB8v.vu2.D1kRtZ26dCyk1CoA7LlpgV6Is/yZO', '2023-10-09', '2023-11-09');
INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES ('emily_brown', 'emily.brown@example.com', '$2y$10$k43L2Ku9m9xF6mt2Y.u0c.n6T2vT1Y5918dV9Fbvw1i1ZvVl3TU/W', '2023-10-11', '2023-11-11');
INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES ('chris_roberts', 'chris.roberts@example.com', '$2y$10$7PFCWI3dt05pwwUo2cTLbeuuCNAdB2p5pvCy2vBwFU/llX70USvW6', '2023-10-13', '2023-11-13');
INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES ('laura_cook', 'laura.cook@example.com', '$2y$10$92oZpRlSX.cV4XrLARK.ngRPinHlB9rdt8LXNS5YD1Ph7WIUArD8e', '2023-10-15', '2023-11-15');
INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES ('matt_harris', 'matt.harris@example.com', '$2y$10$g7.7zSjaJ6JKMlMI9d1/Nesw67J2WfH1NJ2KoSEaIHIz3ROPYR1Dy', '2023-10-17', '2023-11-17');
INSERT INTO users (username, email, password, trial_start_date, trial_end_date) VALUES ('olivia_young', 'olivia.young@example.com', '$2y$10$X3szcqXxbtjP7vge1U8hEusLUPsbSnd9.3Auh7D2Y7cZVDI/ylUVK', '2023-10-19', '2023-11-19');
