CREATE TABLE IF NOT EXISTS clients (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  email VARCHAR(255) NOT NULL,
  phone VARCHAR(255),
  address TEXT,
  registration_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS interaction_logs (
  id INT AUTO_INCREMENT PRIMARY KEY,
  client_id INT,
  interaction_date TIMESTAMP,
  notes TEXT,
  FOREIGN KEY (client_id) REFERENCES clients(id)
);

INSERT INTO clients (name, email, phone, address, registration_date) VALUES 
('John Doe', 'john.doe@example.com', '1234567890', '123 Main St, City, Country', NOW()),
('Jane Smith', 'jane.smith@example.com', '9876543210', '456 Elm St, Town, Country', NOW()),
('Bob Johnson', 'bob.johnson@example.com', '5554443333', '789 Oak St, Village, Country', NOW()),
('Alice Brown', 'alice.brown@example.com', '1231231234', '345 Pine St, Hamlet, Country', NOW()),
('Michael Lee', 'michael.lee@example.com', '9998887777', '678 Maple St, Suburb, Country', NOW()),
('Sarah Davis', 'sarah.davis@example.com', '1112223333', '901 Birch St, Estate, Country', NOW()),
('David Wilson', 'david.wilson@example.com', '7778889999', '234 Cedar St, Township, Country', NOW()),
('Emily Clark', 'emily.clark@example.com', '6665554444', '567 Walnut St, Colony, Country', NOW()),
('Chris White', 'chris.white@example.com', '5556667777', '890 Cherry St, Ranch, Country', NOW()),
('Laura Turner', 'laura.turner@example.com', '2223334444', '123 Plum St, Domain, Country', NOW());
