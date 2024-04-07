CREATE TABLE IF NOT EXISTS CadFiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
filename VARCHAR(255) NOT NULL,
uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO CadFiles (filename) VALUES ('uploads/example1.stl');
INSERT INTO CadFiles (filename) VALUES ('uploads/example2.obj');
INSERT INTO CadFiles (filename) VALUES ('uploads/example3.f3d');
INSERT INTO CadFiles (filename) VALUES ('uploads/example4.stl');
INSERT INTO CadFiles (filename) VALUES ('uploads/example5.obj');
INSERT INTO CadFiles (filename) VALUES ('uploads/example6.f3d');
INSERT INTO CadFiles (filename) VALUES ('uploads/example7.stl');
INSERT INTO CadFiles (filename) VALUES ('uploads/example8.obj');
INSERT INTO CadFiles (filename) VALUES ('uploads/example9.f3d');
INSERT INTO CadFiles (filename) VALUES ('uploads/example10.stl');
