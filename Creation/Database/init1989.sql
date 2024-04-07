CREATE TABLE IF NOT EXISTS psd_files (
  id INT AUTO_INCREMENT PRIMARY KEY,
  file_name VARCHAR(255) NOT NULL,
  upload_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO psd_files (file_name) VALUES ('Landscape_psd1.psd');
INSERT INTO psd_files (file_name) VALUES ('Portrait_psd2.psd');
INSERT INTO psd_files (file_name) VALUES ('Cityscape_psd3.psd');
INSERT INTO psd_files (file_name) VALUES ('Nature_psd4.psd');
INSERT INTO psd_files (file_name) VALUES ('Abstract_psd5.psd');
INSERT INTO psd_files (file_name) VALUES ('Architecture_psd6.psd');
INSERT INTO psd_files (file_name) VALUES ('Wildlife_psd7.psd');
INSERT INTO psd_files (file_name) VALUES ('Food_psd8.psd');
INSERT INTO psd_files (file_name) VALUES ('Fashion_psd9.psd');
INSERT INTO psd_files (file_name) VALUES ('Travel_psd10.psd');