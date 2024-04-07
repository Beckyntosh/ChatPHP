CREATE TABLE IF NOT EXISTS Users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
trial_start_date DATE,
reg_date TIMESTAMP
);

INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES ('John', 'Doe', 'johndoe@example.com', '2022-01-01');
INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES ('Jane', 'Smith', 'janesmith@example.com', '2022-02-15');
INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES ('Alice', 'Johnson', 'alicejohnson@example.com', '2022-03-20');
INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES ('Bob', 'Brown', 'bobbrown@example.com', '2022-04-10');
INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES ('Sarah', 'Williams', 'sarahwilliams@example.com', '2022-05-05');
INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES ('Michael', 'Davis', 'michaeldavis@example.com', '2022-06-30');
INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES ('Emma', 'Martinez', 'emmamartinez@example.com', '2022-07-25');
INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES ('David', 'Garcia', 'davidgarcia@example.com', '2022-08-12');
INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES ('Olivia', 'Rodriguez', 'oliviarodriguez@example.com', '2022-09-18');
INSERT INTO Users (firstname, lastname, email, trial_start_date) VALUES ('James', 'Hernandez', 'jameshernandez@example.com', '2022-10-22');