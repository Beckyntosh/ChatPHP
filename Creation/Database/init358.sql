CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(255),
reg_date TIMESTAMP
);

-- Insert sample data into users table
INSERT INTO users (name, email, password, reg_date) VALUES ('John Doe', 'john.doe@example.com', '$2y$10$A8WIhzBS/10IQg..7TVG6.qvOj2Ooc38H5OfMSBbR7QtdSfHdsECu', CURRENT_TIMESTAMP);
INSERT INTO users (name, email, password, reg_date) VALUES ('Jane Smith', 'jane.smith@example.com', '$2y$10$Hmh6pNVA7OmMl9y5DtpiX.GHK7IkbhfIwEd.DJ07YIwbBjwCigkG.', CURRENT_TIMESTAMP);
INSERT INTO users (name, email, password, reg_date) VALUES ('Alice Johnson', 'alice.johnson@example.com', '$2y$10$UdeplY55/qKpwdq9nZbHJ.xfV9UZplTUO7Jeqi8G8dogR.glxvEhG', CURRENT_TIMESTAMP);
INSERT INTO users (name, email, password, reg_date) VALUES ('Bob Brown', 'bob.brown@example.com', '$2y$10$70FwVLNdK/vFyu9Id8VLs.QmBqUbA7OGbVb7HgrwiZC1agx6qHhd6', CURRENT_TIMESTAMP);
INSERT INTO users (name, email, password, reg_date) VALUES ('Eve Adams', 'eve.adams@example.com', '$2y$10$wSxb/4dnQ4.fDmY7BCkMs.3nf5f6eL8Eg4VAcpl5Iuxl0In2ZsrdC', CURRENT_TIMESTAMP);
INSERT INTO users (name, email, password, reg_date) VALUES ('Michael Lee', 'michael.lee@example.com', '$2y$10$zUkE6lkarz7qMZg9ZReK6.eHlNAAE4KjPe8BnDtPybYdF3MIgQFya', CURRENT_TIMESTAMP);
INSERT INTO users (name, email, password, reg_date) VALUES ('Sarah Wilson', 'sarah.wilson@example.com', '$2y$10$KM1LhZiSJzOWj2A7LhRC2Ow.NqBXfHReGNBOkIXTiJzEH7RrZdSo6', CURRENT_TIMESTAMP);
INSERT INTO users (name, email, password, reg_date) VALUES ('Kevin Davis', 'kevin.davis@example.com', '$2y$10$rpufyC0A.JfE1KZedP5D9eL1oAKIdt8tkkTxW.RNZbduOhL.mJHuG', CURRENT_TIMESTAMP);
INSERT INTO users (name, email, password, reg_date) VALUES ('Laura Rodriguez', 'laura.rodriguez@example.com', '$2y$10$jlLHg.wGleJMEueM7yEW7OE3Jj/2.0l6uHAntX7reuZw3iLtR1P.a', CURRENT_TIMESTAMP);
INSERT INTO users (name, email, password, reg_date) VALUES ('Steven Campbell', 'steven.campbell@example.com', '$2y$10$J5G/EGb7P8ZZox.Lr2PzP.oWRfszQ25y.uB4fZef/7O3R.ztFFo1u', CURRENT_TIMESTAMP);
