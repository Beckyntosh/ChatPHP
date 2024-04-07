CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
premium_features_access TINYINT(1) DEFAULT 0,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('John Doe', 'john.doe@example.com', 'password1', 1);
INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('Jane Smith', 'jane.smith@example.com', 'password2', 1);
INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('Alice Brown', 'alice.brown@example.com', 'password3', 1);
INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('Bob Johnson', 'bob.johnson@example.com', 'password4', 1);
INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('Sarah Davis', 'sarah.davis@example.com', 'password5', 1);
INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('Michael Wilson', 'michael.wilson@example.com', 'password6', 1);
INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('Emily Martinez', 'emily.martinez@example.com', 'password7', 1);
INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('David Thompson', 'david.thompson@example.com', 'password8', 1);
INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('Laura Rodriguez', 'laura.rodriguez@example.com', 'password9', 1);
INSERT INTO users (fullname, email, password, premium_features_access) VALUES ('Kevin Miller', 'kevin.miller@example.com', 'password10', 1);
