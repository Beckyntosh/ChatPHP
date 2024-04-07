CREATE TABLE IF NOT EXISTS forum_users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO forum_users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', '$2y$10$YUZKjFTPw/1JM9P68bJgdue1YmGvE2DlzJ0x4L68/Do9pEv6IY1fi'),
('jane_smith', 'jane.smith@example.com', '$2y$10$1zT9ehQJcDxPLGF5uYXsoeb7w.EB4OlMAcAuwL0jGrSfsLBqYnQz6'),
('mark_jackson', 'mark.jackson@example.com', '$2y$10$FncQxjx6KPi7.zQPX/AEg.yBKzIgBR7p2YbToxx2iSHAXpa5PkOam'),
('sarah_carter', 'sarah.carter@example.com', '$2y$10$o7Ve35uV13aVb7Iw9r.JueBjpde.x7iVMztUq5w9e4JSutllKfLk2'),
('ryan_adams', 'ryan.adams@example.com', '$2y$10$xpIlA7lmuuzwHKdkpME3FuyYTucwwJvI6TYBxBnJY8e9hGMjqOjtW'),
('lisa_walker', 'lisa.walker@example.com', '$2y$10$qOiMm9400kRjR9yjNS1Oy.VTg5T7LH6PQnNlLPUUTXfbAn5VUqvGy'),
('david_ross', 'david.ross@example.com', '$2y$10$NvOy0UaJlqnkC9LB2YzMWuGxre9YcFpjPvJG48IIL81h8pkwQEsya'),
('emily_hall', 'emily.hall@example.com', '$2y$10$3v4jwgbZ2UcbDVwioBESG.yMgXeTdlCM.g9iXSuAqye9Pt5oqyDA2'),
('michael_lewis', 'michael.lewis@example.com', '$2y$10$t6iX0.2n7XUidCcn6SPU0ezy.kX8mOE7TTWZvd7xDWWXG5e6wKEa6'),
('olivia_parker', 'olivia.parker@example.com', '$2y$10$0HxHo3aD./gQWMkThk2YnupTzmkWJfQhKv0a/4i4cEtk.39jbjXcy');
