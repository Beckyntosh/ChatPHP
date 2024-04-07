CREATE TABLE IF NOT EXISTS patients (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(255) NOT NULL,
    email VARCHAR(50),
    pet_name VARCHAR(50),
    appointment_date DATE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO patients (fullname, email, pet_name, appointment_date) VALUES 
('John Doe', 'johndoe@example.com', 'Buddy', '2023-10-15'),
('Jane Smith', 'janesmith@example.com', 'Max', '2023-10-20'),
('Michael Johnson', 'michael@example.com', 'Charlie', '2023-10-25'),
('Sarah Brown', 'sarahbrown@example.com', 'Lucy', '2023-11-02'),
('Robert Miller', 'robertmiller@example.com', 'Bailey', '2023-11-05'),
('Karen Wilson', 'karenwilson@example.com', 'Molly', '2023-11-10'),
('David Lee', 'davidlee@example.com', 'Bella', '2023-11-15'),
('Emily Cooper', 'emilycooper@example.com', 'Rocky', '2023-11-20'),
('Tom Anderson', 'tomanderson@example.com', 'Daisy', '2023-11-25'),
('Olivia Taylor', 'oliviataylor@example.com', 'Lola', '2023-11-30');
