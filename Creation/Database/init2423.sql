CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
trial_start_date DATE,
subscription_status VARCHAR(10) DEFAULT 'inactive',
reg_date TIMESTAMP
);

INSERT INTO users (username, email, password, trial_start_date, subscription_status) VALUES ('JohnDoe', 'john.doe@example.com', 'hashedpassword1', '2022-01-01', 'active'),
('JaneSmith', 'jane.smith@example.com', 'hashedpassword2', '2022-02-15', 'active'),
('AliceWonderland', 'alice.wonderland@example.com', 'hashedpassword3', '2022-03-20', 'inactive'),
('BobMarley', 'bob.marley@example.com', 'hashedpassword4', '2022-04-10', 'inactive'),
('EvaGreen', 'eva.green@example.com', 'hashedpassword5', '2022-05-05', 'inactive'),
('MikeJohnson', 'mike.johnson@example.com', 'hashedpassword6', '2022-06-30', 'active'),
('OliviaBrown', 'olivia.brown@example.com', 'hashedpassword7', '2022-07-25', 'inactive'),
('ChrisMiller', 'chris.miller@example.com', 'hashedpassword8', '2022-08-15', 'active'),
('EmilyDavis', 'emily.davis@example.com', 'hashedpassword9', '2022-09-05', 'inactive'),
('SamRoberts', 'sam.roberts@example.com', 'hashedpassword10', '2022-10-22', 'active');