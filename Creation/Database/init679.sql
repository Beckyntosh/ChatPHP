CREATE TABLE tasks (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  description TEXT,
  dueDate DATE,
  completed BOOLEAN NOT NULL
);

INSERT INTO tasks (name, description, dueDate, completed) VALUES ('Task 1', 'Description 1', '2022-01-15', 1);
INSERT INTO tasks (name, description, dueDate, completed) VALUES ('Task 2', 'Description 2', '2022-02-28', 0);
INSERT INTO tasks (name, description, dueDate, completed) VALUES ('Task 3', 'Description 3', '2022-03-10', 1);
INSERT INTO tasks (name, description, dueDate, completed) VALUES ('Task 4', 'Description 4', '2022-04-05', 0);
INSERT INTO tasks (name, description, dueDate, completed) VALUES ('Task 5', 'Description 5', '2022-05-20', 1);
INSERT INTO tasks (name, description, dueDate, completed) VALUES ('Task 6', 'Description 6', '2022-06-18', 0);
INSERT INTO tasks (name, description, dueDate, completed) VALUES ('Task 7', 'Description 7', '2022-07-11', 1);
INSERT INTO tasks (name, description, dueDate, completed) VALUES ('Task 8', 'Description 8', '2022-08-30', 0);
INSERT INTO tasks (name, description, dueDate, completed) VALUES ('Task 9', 'Description 9', '2022-09-14', 1);
INSERT INTO tasks (name, description, dueDate, completed) VALUES ('Task 10', 'Description 10', '2022-10-25', 0);