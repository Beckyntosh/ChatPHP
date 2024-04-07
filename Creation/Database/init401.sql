CREATE TABLE users (
        id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        google_id VARCHAR(30) NOT NULL,
        name VARCHAR(50),
        email VARCHAR(50),
        profile_pic VARCHAR(100)
    );

INSERT INTO users (google_id, name, email, profile_pic) VALUES ('123456789', 'John Doe', 'john.doe@example.com', 'https://example.com/profile_pic_1.jpg');
INSERT INTO users (google_id, name, email, profile_pic) VALUES ('987654321', 'Jane Smith', 'jane.smith@example.com', 'https://example.com/profile_pic_2.jpg');
INSERT INTO users (google_id, name, email, profile_pic) VALUES ('456789123', 'Alice Brown', 'alice.brown@example.com', 'https://example.com/profile_pic_3.jpg');
INSERT INTO users (google_id, name, email, profile_pic) VALUES ('789123456', 'Bob Johnson', 'bob.johnson@example.com', 'https://example.com/profile_pic_4.jpg');
INSERT INTO users (google_id, name, email, profile_pic) VALUES ('654321789', 'Mary Davis', 'mary.davis@example.com', 'https://example.com/profile_pic_5.jpg');
INSERT INTO users (google_id, name, email, profile_pic) VALUES ('321789456', 'James Wilson', 'james.wilson@example.com', 'https://example.com/profile_pic_6.jpg');
INSERT INTO users (google_id, name, email, profile_pic) VALUES ('012345678', 'Sarah Lee', 'sarah.lee@example.com', 'https://example.com/profile_pic_7.jpg');
INSERT INTO users (google_id, name, email, profile_pic) VALUES ('654987321', 'Michael Clark', 'michael.clark@example.com', 'https://example.com/profile_pic_8.jpg');
INSERT INTO users (google_id, name, email, profile_pic) VALUES ('987123654', 'Emily Martinez', 'emily.martinez@example.com', 'https://example.com/profile_pic_9.jpg');
INSERT INTO users (google_id, name, email, profile_pic) VALUES ('789456123', 'David Rodriguez', 'david.rodriguez@example.com', 'https://example.com/profile_pic_10.jpg');
