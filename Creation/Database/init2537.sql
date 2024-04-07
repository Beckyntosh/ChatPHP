CREATE TABLE IF NOT EXISTS volunteers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(15),
    event_id INT(6),
    registration_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(50) NOT NULL,
    event_date DATE NOT NULL,
    event_location VARCHAR(100),
    description TEXT
);

INSERT INTO volunteers (fullname, email, phone, event_id) VALUES ('Alice Johnson', 'alice@example.com', '1234567890', 1);
INSERT INTO volunteers (fullname, email, phone, event_id) VALUES ('Bob Smith', 'bob@example.com', '9876543210', 2);
INSERT INTO volunteers (fullname, email, phone, event_id) VALUES ('Catherine Lee', 'catherine@example.com', '4567890123', 1);
INSERT INTO volunteers (fullname, email, phone, event_id) VALUES ('David Green', 'david@example.com', '7890123456', 2);
INSERT INTO volunteers (fullname, email, phone, event_id) VALUES ('Emma Brown', 'emma@example.com', '3216549870', 1);
INSERT INTO volunteers (fullname, email, phone, event_id) VALUES ('Frank Davis', 'frank@example.com', '6549870123', 2);
INSERT INTO volunteers (fullname, email, phone, event_id) VALUES ('Grace White', 'grace@example.com', '0123456789', 1);
INSERT INTO volunteers (fullname, email, phone, event_id) VALUES ('Henry Parker', 'henry@example.com', '6543217890', 2);
INSERT INTO volunteers (fullname, email, phone, event_id) VALUES ('Ivy Wilson', 'ivy@example.com', '9870123456', 1);
INSERT INTO volunteers (fullname, email, phone, event_id) VALUES ('James Adams', 'james@example.com', '0123456789', 2);

INSERT INTO events (event_name, event_date, event_location, description) VALUES ('Local Charity Event 1', '2022-10-15', 'City Park', 'Fundraising event for animal shelter');
INSERT INTO events (event_name, event_date, event_location, description) VALUES ('Local Charity Event 2', '2022-11-05', 'Community Center', 'Food drive for homeless shelter');
