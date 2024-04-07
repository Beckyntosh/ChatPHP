CREATE TABLE IF NOT EXISTS due_dates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    last_period DATE,
    conception_date DATE,
    due_date DATE
);

INSERT INTO due_dates (last_period, conception_date, due_date) VALUES
('2022-01-01', '', '2022-10-08'),
('2021-12-15', '', '2022-09-20'),
('2022-03-05', '', '2023-11-10'),
('', '2022-07-01', '2023-03-26'),
('', '2022-04-20', '2023-01-13'),
('2022-02-10', '', '2022-11-17'),
('2021-11-25', '', '2022-09-01'),
('2022-05-20', '', '2023-02-24'),
('', '2022-08-10', '2023-04-24'),
('2022-06-30', '', '2023-04-06');
