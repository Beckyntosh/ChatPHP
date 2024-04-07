CREATE TABLE IF NOT EXISTS users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'securepass');
INSERT INTO users (username, password) VALUES ('volunteer123', 'volunteerpass');
INSERT INTO users (username, password) VALUES ('charity_vol', 'charitypass');
INSERT INTO users (username, password) VALUES ('support_volunteer', 'supportpass');
INSERT INTO users (username, password) VALUES ('helping_hand', 'helppass');
INSERT INTO users (username, password) VALUES ('community_vol', 'communitypass');
INSERT INTO users (username, password) VALUES ('kindness_agent', 'kindnesspass');
INSERT INTO users (username, password) VALUES ('social_servant', 'socialpass');
INSERT INTO users (username, password) VALUES ('volunteer4cause', 'causepass');
