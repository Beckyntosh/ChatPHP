CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    language VARCHAR(50) NOT NULL
);

INSERT INTO users (username, email, password, language) VALUES ('john_doe', 'john.doe@example.com', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'English');
INSERT INTO users (username, email, password, language) VALUES ('jane_smith', 'jane.smith@example.com', '21232f297a57a5a743894a0e4a801fc3', 'French');
INSERT INTO users (username, email, password, language) VALUES ('mike_jones', 'mike.jones@example.com', '0192023a7bbd73250516f069df18b500', 'Spanish');
INSERT INTO users (username, email, password, language) VALUES ('sarah_white', 'sarah.white@example.com', 'dff78c83906d45e2c2183e221f1c60c0', 'English');
INSERT INTO users (username, email, password, language) VALUES ('peter_smith', 'peter.smith@example.com', '94ee059335e587e501cc0db67de16974', 'German');
INSERT INTO users (username, email, password, language) VALUES ('amy_brown', 'amy.brown@example.com', '50b8acc732429d15f202a6b8813765f1', 'French');
INSERT INTO users (username, email, password, language) VALUES ('chris_davis', 'chris.davis@example.com', '35168364bb5994e3cd3c93474fef4b78', 'Spanish');
INSERT INTO users (username, email, password, language) VALUES ('linda_wilson', 'linda.wilson@example.com', '6e01eb15379a0d233a126206f49d4ff2', 'English');
INSERT INTO users (username, email, password, language) VALUES ('kevin_larson', 'kevin.larson@example.com', 'e30eda52e6c7850973502bf593edc597', 'German');
INSERT INTO users (username, email, password, language) VALUES ('emily_garcia', 'emily.garcia@example.com', '2fab7c870609039a30be5a84ea393c78', 'French');
