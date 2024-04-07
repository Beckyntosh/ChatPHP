CREATE TABLE IF NOT EXISTS code_reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  feature_name VARCHAR(255) NOT NULL,
  code LONGTEXT NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO code_reviews (feature_name, code) VALUES ('Feature X', '<?php echo "This is the code for Feature X"; ?>');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature Y', '<?php echo "This is the code for Feature Y"; ?>');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature Z', '<?php echo "This is the code for Feature Z"; ?>');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature A', '<?php echo "This is the code for Feature A"; ?>');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature B', '<?php echo "This is the code for Feature B"; ?>');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature C', '<?php echo "This is the code for Feature C"; ?>');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature D', '<?php echo "This is the code for Feature D"; ?>');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature E', '<?php echo "This is the code for Feature E"; ?>');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature F', '<?php echo "This is the code for Feature F"; ?>');
INSERT INTO code_reviews (feature_name, code) VALUES ('Feature G', '<?php echo "This is the code for Feature G"; ?>');
