CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL UNIQUE,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, name, email, password) VALUES ('john_doe', 'John Doe', 'john.doe@example.com', '$2y$10$oI6twI8smIDUiMfbq0AMroe0Epmf75G.aJ8rHtmXX4NX6mYJoKncm'), 
('alice_smith', 'Alice Smith', 'alice.smith@example.com', '$2y$10$YphFSkRV4wDlgXwB4x2d9eVNwu2J3A995J7xOCnancist61/Bz4sC'), 
('bob_jones', 'Bob Jones', 'bob.jones@example.com', '$2y$10$IoLgPw2tD7TNNttGgJ8iBurXpag5hTlhtKICY8t5p1KY7Ze1ZA3fa'), 
('emily_white', 'Emily White', 'emily.white@example.com', '$2y$10$iNdZX.v1azIjFxhPFWwuq.UrZhP8u8gFb1Oz9w5P9/Bz4sC'), 
('sam_green', 'Sam Green', 'sam.green@example.com', '$2y$10$u6txRBy3U2gdumI5iEVaLeLfD3mRracxBMgXjzyuJ75jvkm3OMM7S'), 
('laura_brown', 'Laura Brown', 'laura.brown@example.com', '$2y$10$RH.kF38e0zjEJu9fbSYVPOEA8sprR00vFRlDmZ10.yzoqw7oM2oZS'), 
('mike_taylor', 'Mike Taylor', 'mike.taylor@example.com', '$2y$10$ZSo8MvJOaDgZgCJeD0DYL.qUyFSsMToCGekVAWhvCpV9HcSjoZoxm'), 
('jessica_wilson', 'Jessica Wilson', 'jessica.wilson@example.com', '$2y$10$Skt528/q1JdmoOVaxUqIjOaZ9uWqreB0M.9sLEBdVAc6EHf05j.aO'), 
('chris_jackson', 'Chris Jackson', 'chris.jackson@example.com', '$2y$10$8LtEe0yCaF.Y/5NZfWRxbOYhUvPqOoYHmOAEFFkjI1jwCYVPrXu3W'), 
('sophia_evans', 'Sophia Evans', 'sophia.evans@example.com', '$2y$10$y3ufVPPa2vZ5sy47hj9toueMzP6TFWl3cwXUx13zySDR.GV4KKq82');
