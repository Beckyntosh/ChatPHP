CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    google_id VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    profile_pic VARCHAR(255)
);

INSERT INTO users (google_id, email, name, profile_pic) VALUES 
('123456789', 'example1@gmail.com', 'John Doe', 'profile1.jpg'),
('987654321', 'example2@gmail.com', 'Jane Smith', 'profile2.jpg'),
('456789123', 'example3@gmail.com', 'Alice Johnson', 'profile3.jpg'),
('789123456', 'example4@gmail.com', 'Bob Brown', 'profile4.jpg'),
('654321987', 'example5@gmail.com', 'Emily Davis', 'profile5.jpg'),
('321987654', 'example6@gmail.com', 'Mike Wilson', 'profile6.jpg'),
('654987321', 'example7@gmail.com', 'Sarah Clark', 'profile7.jpg'),
('123987456', 'example8@gmail.com', 'James Lee', 'profile8.jpg'),
('789654321', 'example9@gmail.com', 'Laura White', 'profile9.jpg'),
('987321654', 'example10@gmail.com', 'Tom Anderson', 'profile10.jpg');
