CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    language VARCHAR(10),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO Users (username, email, language) VALUES ('JohnDoe', 'johndoe@example.com', 'English');
INSERT INTO Users (username, email, language) VALUES ('JaneSmith', 'janesmith@example.com', 'French');
INSERT INTO Users (username, email, language) VALUES ('MariaGarcia', 'mariagarcia@example.com', 'Spanish');
INSERT INTO Users (username, email, language) VALUES ('DavidBrown', 'davidbrown@example.com', 'English');
INSERT INTO Users (username, email, language) VALUES ('SophieLee', 'sophielee@example.com', 'French');
INSERT INTO Users (username, email, language) VALUES ('CarlosRodriguez', 'carlosrodriguez@example.com', 'Spanish');
INSERT INTO Users (username, email, language) VALUES ('EmilyWhite', 'emilywhite@example.com', 'English');
INSERT INTO Users (username, email, language) VALUES ('LucaMartinez', 'lucamartinez@example.com', 'French');
INSERT INTO Users (username, email, language) VALUES ('IsabellaLopez', 'isabellalopez@example.com', 'Spanish');
INSERT INTO Users (username, email, language) VALUES ('MichaelNguyen', 'michaelnguyen@example.com', 'English');
