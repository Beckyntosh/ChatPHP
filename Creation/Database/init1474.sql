CREATE TABLE IF NOT EXISTS backup_uploads (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    upload_date DATETIME NOT NULL
);

-- Insert sample data into backup_uploads table
INSERT INTO backup_uploads (filename, upload_date) VALUES ('MainDB_Backup_March2024', '2024-03-01 12:00:00');
INSERT INTO backup_uploads (filename, upload_date) VALUES ('Backup_April2024', '2024-04-15 08:30:00');
INSERT INTO backup_uploads (filename, upload_date) VALUES ('DB_Backup_Feb2024', '2024-02-28 10:45:00');
INSERT INTO backup_uploads (filename, upload_date) VALUES ('Backup_Jan2024', '2024-01-10 14:20:00');
INSERT INTO backup_uploads (filename, upload_date) VALUES ('MainDB_Backup_May2024', '2024-05-05 16:55:00');
INSERT INTO backup_uploads (filename, upload_date) VALUES ('Backup_June2024', '2024-06-20 20:10:00');
INSERT INTO backup_uploads (filename, upload_date) VALUES ('DB_Backup_Aug2024', '2024-08-12 09:30:00');
INSERT INTO backup_uploads (filename, upload_date) VALUES ('Backup_Sep2024', '2024-09-28 11:40:00');
INSERT INTO backup_uploads (filename, upload_date) VALUES ('MainDB_Backup_Oct2024', '2024-10-17 13:25:00');
INSERT INTO backup_uploads (filename, upload_date) VALUES ('Backup_Nov2024', '2024-11-30 15:50:00');
