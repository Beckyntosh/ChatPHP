CREATE TABLE IF NOT EXISTS uploaded_configs (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(100) NOT NULL,
    upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO uploaded_configs (filename) VALUES ('nginx.conf');
INSERT INTO uploaded_configs (filename) VALUES ('apache.conf');
INSERT INTO uploaded_configs (filename) VALUES ('mysql.conf');
INSERT INTO uploaded_configs (filename) VALUES ('tomcat.conf');
INSERT INTO uploaded_configs (filename) VALUES ('nginx2.conf');
INSERT INTO uploaded_configs (filename) VALUES ('apache2.conf');
INSERT INTO uploaded_configs (filename) VALUES ('mysql2.conf');
INSERT INTO uploaded_configs (filename) VALUES ('tomcat2.conf');
INSERT INTO uploaded_configs (filename) VALUES ('nginx3.conf');
INSERT INTO uploaded_configs (filename) VALUES ('apache3.conf');