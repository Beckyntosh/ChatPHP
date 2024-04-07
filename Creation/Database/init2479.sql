CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) UNIQUE NOT NULL,
  password VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS appointments (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_email VARCHAR(50) NOT NULL,
  appointment_date DATE NOT NULL
);

INSERT INTO users (name, email, password) VALUES
('John Doe', 'johndoe@example.com', 'password1'),
('Jane Doe', 'janedoe@example.com', 'password2'),
('Michael Smith', 'michaelsmith@example.com', 'password3'),
('Emily Johnson', 'emilyjohnson@example.com', 'password4');

INSERT INTO appointments (user_email, appointment_date) VALUES
('johndoe@example.com', '2022-12-15'),
('janedoe@example.com', '2022-12-20'),
('michaelsmith@example.com', '2022-12-25'),
('emilyjohnson@example.com', '2022-12-30');
