CREATE TABLE IF NOT EXISTS DueDates (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
lastPeriod DATE NOT NULL,
dueDate DATE NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('2022-01-01', '2022-09-08');
INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('2022-02-15', '2022-11-22');
INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('2021-11-30', '2022-08-06');
INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('2022-04-10', '2023-01-16');
INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('2022-06-25', '2023-04-01');
INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('2022-08-30', '2023-05-07');
INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('2022-03-05', '2022-11-11');
INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('2021-12-20', '2022-09-26');
INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('2022-05-03', '2023-01-09');
INSERT INTO DueDates (lastPeriod, dueDate) VALUES ('2022-07-17', '2023-03-23');
