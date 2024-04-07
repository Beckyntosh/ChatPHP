CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  password VARCHAR(255),
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (fullname, email, password) VALUES
('Alice Johnson', 'alice@example.com', '$2y$10$uhmdz0ZK6XqjKsYwuzF7geQwcC28LjzHm1Hlno9BNR8sAzqzZSIwa'),
('Bob Smith', 'bob@example.com', '$2y$10$pBcM3gMWp98X9TMZsCS.tuKBiN5OoISVhMxEELbfZkwDU8czEbgV2'),
('Eve Brown', 'eve@example.com', '$2y$10$FvhHyvPjW1n3S2s0VtI7T.UupbL2cpuKTW7FH/KV8at7U3nXU/Ule'),
('David Lee', 'david@example.com', '$2y$10$4mQ6sISIucTIAbmZ9t5Ag.oNx9kuelkTujT2RM8BdWEmycE0W3G5C'),
('Sarah Davis', 'sarah@example.com', '$2y$10$TtAieM5p6WjBNJmWeQ4ATuMPJ2KTn1jvp5KfYFv5IUk1cFB8Xissh'),
('Michael Wilson', 'michael@example.com', '$2y$10$Hv9LWk02gfKp.bk8Mn8EL.uuY2S7lHpmMz6WtcKsJuS9wU25vFsBi'),
('Grace Clark', 'grace@example.com', '$2y$10$LCZ2EhqFnXnN3IT12SQ0PuJLMf9ffHBVqiwoDNbYm4nG8rq7UGn1K'),
('Ryan Anderson', 'ryan@example.com', '$2y$10$5ZzW1QwhRytMb4nGxT.vI.JDu.ZEN5UZPs6gOPp/S.XcQgSlQT3o2'),
('Linda Martinez', 'linda@example.com', '$2y$10$VH1WJ.p3gj6xCKSsF/n2ueYTUhy7e6FcskjK.NwzdqV4nKkB1NL32'),
('Aaron Robinson', 'aaron@example.com', '$2y$10$TzuaQToCU2b8LcizQSuJKUUEwN9G7vboAuRvJA9soyNNZD2Dj7h9K');
