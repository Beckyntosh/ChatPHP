CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(100) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (fullname, email, password) VALUES ('John Doe', 'johndoe@example.com', '$2y$10$zpP.w2S9dOk1fIyR5bXKD.cXjT3KEy7CTdRpI.cnGzLQmc3pglC/a');
INSERT INTO users (fullname, email, password) VALUES ('Jane Smith', 'janesmith@example.com', '$2y$10$u33YpySeMk3Vwk4TNzKhh.EVpTslAEVJxLYl1HCJHx3SDQOFn77HK');
INSERT INTO users (fullname, email, password) VALUES ('Alice Johnson', 'alicejohnson@example.com', '$2y$10$foi5tAo7huwlBo2Ve1FE6uuevR7sZ6DqoOKgNnEf4jWWye2V9yi7m');
INSERT INTO users (fullname, email, password) VALUES ('Bob Brown', 'bobbrown@example.com', '$2y$10$MZ1BwKF.VWE/8soYXAHgK.qmgFGdxf3mJ/4TQJp2QOpsSbl8bx0.q');
INSERT INTO users (fullname, email, password) VALUES ('Elena Rodriguez', 'elenarodriguez@example.com', '$2y$10$ExH69BS0qDyA9ZL0DyoYr.nE/qJqqNGL0NTZC2.kmAyT9YUPUmuQO');
INSERT INTO users (fullname, email, password) VALUES ('Michael Nguyen', 'michaelnguyen@example.com', '$2y$10$fVTIp2v8IUGTVZQ9wWqLK.DQXd4l2YMg.QvI5j7IeNa9RSVV/2IW2');
INSERT INTO users (fullname, email, password) VALUES ('Olivia Lee', 'oliviale@example.com', '$2y$10$CB85Kby5WqVSbTZ7uEiI/.EDKOhX6qEmF1.NnAnVcCd9BOHj/URhG');
INSERT INTO users (fullname, email, password) VALUES ('David Kim', 'davidkim@example.com', '$2y$10$y8FbDTzrV4xw/Dq/dbPBmuiJl8DIexguuy8LNJyWe043BYYOTnSC2');
INSERT INTO users (fullname, email, password) VALUES ('Sophia Chen', 'sophiachen@example.com', '$2y$10$QGyK6O.VfwPt9QgbDdR4OOTJPo/KRQlK68cdPP2JUJEYMdWOX5oj2');
INSERT INTO users (fullname, email, password) VALUES ('William Jones', 'williamjones@example.com', '$2y$10$tCaurEV7ML7Jp9c3fIw8uOkQp1.xx7njOfP5G11CwB/uY3cHvaOdK');