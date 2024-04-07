CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    two_fa_secret VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS backup_codes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    code VARCHAR(100) NOT NULL,
    used TINYINT(1) NOT NULL DEFAULT 0,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

INSERT INTO users (username, password, two_fa_secret) VALUES ('user1', 'password1', 'secret1');
INSERT INTO users (username, password, two_fa_secret) VALUES ('user2', 'password2', 'secret2');
INSERT INTO users (username, password, two_fa_secret) VALUES ('user3', 'password3', 'secret3');
INSERT INTO users (username, password, two_fa_secret) VALUES ('user4', 'password4', 'secret4');
INSERT INTO users (username, password, two_fa_secret) VALUES ('user5', 'password5', 'secret5');
INSERT INTO users (username, password, two_fa_secret) VALUES ('user6', 'password6', 'secret6');
INSERT INTO users (username, password, two_fa_secret) VALUES ('user7', 'password7', 'secret7');
INSERT INTO users (username, password, two_fa_secret) VALUES ('user8', 'password8', 'secret8');
INSERT INTO users (username, password, two_fa_secret) VALUES ('user9', 'password9', 'secret9');
INSERT INTO users (username, password, two_fa_secret) VALUES ('user10', 'password10', 'secret10');
