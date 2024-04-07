CREATE TABLE IF NOT EXISTS code_uploads (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
creatorName VARCHAR(30) NOT NULL,
fileName VARCHAR(50),
code LONGTEXT,
uploadTime TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('Alice', 'featureA.php', '<?php echo "Feature A code here"; ?>');
INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('Bob', 'featureB.js', 'function featureB(){ return "Feature B code"; }');
INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('Charlie', 'featureC.php', '<?php echo "Feature C code here"; ?>');
INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('David', 'featureD.js', 'function featureD(){ return "Feature D code"; }');
INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('Eve', 'featureE.php', '<?php echo "Feature E code here"; ?>');
INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('Frank', 'featureF.js', 'function featureF(){ return "Feature F code"; }');
INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('Grace', 'featureG.php', '<?php echo "Feature G code here"; ?>');
INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('Henry', 'featureH.js', 'function featureH(){ return "Feature H code"; }');
INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('Ivy', 'featureI.php', '<?php echo "Feature I code here"; ?>');
INSERT INTO code_uploads (creatorName, fileName, code) VALUES ('Jack', 'featureJ.js', 'function featureJ(){ return "Feature J code"; }');
