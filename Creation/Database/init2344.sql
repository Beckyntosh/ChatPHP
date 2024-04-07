CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        password VARCHAR(32),
        reg_date TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', 'e10adc3949ba59abbe56e057f20f883e');
INSERT INTO users (username, email, password) VALUES ('jane_smith', 'jane.smith@example.com', '5f4dcc3b5aa765d61d8327deb882cf99');
INSERT INTO users (username, email, password) VALUES ('alex_brown', 'alex.brown@example.com', '098f6bcd4621d373cade4e832627b4f6');
INSERT INTO users (username, email, password) VALUES ('sarah_jones', 'sarah.jones@example.com', '7c6a180b36896a0a8c02787eeafb0e4c');
INSERT INTO users (username, email, password) VALUES ('michael_wilson', 'michael.wilson@example.com', '21232f297a57a5a743894a0e4a801fc3');
INSERT INTO users (username, email, password) VALUES ('emily_adams', 'emily.adams@example.com', '0192023a7bbd73250516f069df18b500');
INSERT INTO users (username, email, password) VALUES ('ryan_carter', 'ryan.carter@example.com', 'aacd18c71d90a7f28d091aceef6e33d9');
INSERT INTO users (username, email, password) VALUES ('lisa_miller', 'lisa.miller@example.com', '18f3f3ef5c8e756b5b2e7f3f1b9078d0');
INSERT INTO users (username, email, password) VALUES ('kevin_clark', 'kevin.clark@example.com', 'c99a3b66d0df69266bc02a2d1ed37222');
INSERT INTO users (username, email, password) VALUES ('natalie_harris', 'natalie.harris@example.com', '5baa61e4c9b93f3f0682250b6cf8331b');
