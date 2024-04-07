CREATE TABLE IF NOT EXISTS uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    mimetype VARCHAR(100),
    data LONGBLOB
);

INSERT INTO uploads (name, mimetype, data) VALUES ('Book1', 'application/pdf', 'PDF Data 1');
INSERT INTO uploads (name, mimetype, data) VALUES ('Book2', 'application/pdf', 'PDF Data 2');
INSERT INTO uploads (name, mimetype, data) VALUES ('Book3', 'application/pdf', 'PDF Data 3');
INSERT INTO uploads (name, mimetype, data) VALUES ('Book4', 'application/pdf', 'PDF Data 4');
INSERT INTO uploads (name, mimetype, data) VALUES ('Book5', 'application/pdf', 'PDF Data 5');
INSERT INTO uploads (name, mimetype, data) VALUES ('Book6', 'application/pdf', 'PDF Data 6');
INSERT INTO uploads (name, mimetype, data) VALUES ('Book7', 'application/pdf', 'PDF Data 7');
INSERT INTO uploads (name, mimetype, data) VALUES ('Book8', 'application/pdf', 'PDF Data 8');
INSERT INTO uploads (name, mimetype, data) VALUES ('Book9', 'application/pdf', 'PDF Data 9');
INSERT INTO uploads (name, mimetype, data) VALUES ('Book10', 'application/pdf', 'PDF Data 10');
