CREATE TABLE IF NOT EXISTS users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', '$2y$10$2VHX3XuQfmm8VxXUlEALluU.gQ9H6MPSSb4sg0.IAKjAx6b0Lf3oe');

INSERT INTO users (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', '$2y$10$3gFCw3lBr3bgNfaS/VB9ju6DKJ3BbDqBKd8Bkwk5dzhnQws7zMQiW');

INSERT INTO users (username, email, password) VALUES ('test_user1', 'test1@example.com', '$2y$10$tyrKV/8EEMoDWoK1fz6duOZVzh3Qj1/PagaIazyDGh9CooqS3oBr6');

INSERT INTO users (username, email, password) VALUES ('test_user2', 'test2@example.com', '$2y$10$zVzqh0d4E6wPSANRAkeDKOQXkRHbErOyoo2Iiwk59A864rhrX0cYu');

INSERT INTO users (username, email, password) VALUES ('user3', 'user3@example.com', '$2y$10$bzB2CS98bSqDIwS4FfGVc.BXP4AqaabzFklQvt.mD4jKxlR/jXHpu');

INSERT INTO users (username, email, password) VALUES ('user4', 'user4@example.com', '$2y$10$R3Oj1HZtKpz7n0C8.bI1OeUuFQAG7TmGZM3JLZRLyDin7O4SbfOk6');

INSERT INTO users (username, email, password) VALUES ('student1', 'student1@example.com', '$2y$10$Jke60zT5Xhax0J30Z0t3UeW6776OHQ33CnqW.FZhTpEL00vB5CMUW');

INSERT INTO users (username, email, password) VALUES ('developer123', 'dev123@example.com', '$2y$10$ag7H6j9sK5hM7mx0i1FuPeYaOgJotB0UVlfdkD6tVBQtp5NC1U0DC');

INSERT INTO users (username, email, password) VALUES ('designer456', 'designer456@example.com', '$2y$10$DimIdzzhsj4jlZ7WRPMv7uYmCzTQ35T9S1rDG7XV6NMx0I3eWtFD2');

INSERT INTO users (username, email, password) VALUES ('admin_user', 'admin@example.com', '$2y$10$7MBNFC0VCa9MzIpJXo0pJuE9NIkFgq51ydcL/jLzhd11jFOAl9GYK');
