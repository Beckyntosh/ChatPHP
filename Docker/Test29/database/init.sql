CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(50) NOT NULL,
    description TEXT,
    event_date DATE NOT NULL,
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS volunteers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    event_id INT(6) UNSIGNED,
    registration_date TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES events(id)
);

INSERT INTO events (event_name, description, event_date) VALUES ('Charity Gala', 'Fundraising event for children in need', '2022-11-15');
INSERT INTO events (event_name, description, event_date) VALUES ('Food Drive', 'Collecting food items for the homeless', '2022-12-05');
INSERT INTO events (event_name, description, event_date) VALUES ('Community Clean-up', 'Cleaning the local park', '2023-01-20');
INSERT INTO events (event_name, description, event_date) VALUES ('Blood Donation Camp', 'Donate blood for saving lives', '2023-02-10');
INSERT INTO events (event_name, description, event_date) VALUES ('Animal Shelter Volunteer', 'Helping out at the local animal shelter', '2023-03-08');

INSERT INTO volunteers (full_name, email, phone, event_id) VALUES ('Alice Smith', 'alice@example.com', '123-456-7890', 1);
INSERT INTO volunteers (full_name, email, phone, event_id) VALUES ('Bob Johnson', 'bob@example.com', '987-654-3210', 2);
INSERT INTO volunteers (full_name, email, phone, event_id) VALUES ('Eva Wilson', 'eva@example.com', '555-555-5555', 3);
INSERT INTO volunteers (full_name, email, phone, event_id) VALUES ('David Brown', 'david@example.com', '111-222-3333', 4);
INSERT INTO volunteers (full_name, email, phone, event_id) VALUES ('Sophia Davis', 'sophia@example.com', '999-999-9999', 5);
