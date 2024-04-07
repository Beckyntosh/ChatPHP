CREATE TABLE IF NOT EXISTS Volunteers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phoneNumber VARCHAR(15),
    event VARCHAR(50) NOT NULL,
    registrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Volunteers (fullName, email, phoneNumber, event) VALUES 
('Alice Johnson', 'alice@example.com', '123-456-7890', 'Local Charity Event'),
('Bob Smith', 'bob@example.com', '987-654-3210', 'Community Clean-up'),
('Cindy Davis', 'cindy@example.com', '555-555-5555', 'Food Bank Help'),
('David Lee', 'david@example.com', '777-777-7777', 'Local Charity Event'),
('Emma White', 'emma@example.com', '666-666-6666', 'Community Clean-up'),
('Frank Brown', 'frank@example.com', '444-444-4444', 'Food Bank Help'),
('Grace Miller', 'grace@example.com', '222-222-2222', 'Local Charity Event'),
('Henry Young', 'henry@example.com', '333-333-3333', 'Community Clean-up'),
('Ivy Lopez', 'ivy@example.com', '999-999-9999', 'Food Bank Help'),
('Jack Harris', 'jack@example.com', '888-888-8888', 'Other');
