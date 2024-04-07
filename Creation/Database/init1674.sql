CREATE TABLE backups (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filetype VARCHAR(50) NOT NULL,
    filesize INT NOT NULL
);

INSERT INTO backups (filename, filetype, filesize) VALUES ('MainDB_Backup_March2024', 'sql', 10240);
INSERT INTO backups (filename, filetype, filesize) VALUES ('DB_Backup_April2024', 'sql', 20480);
INSERT INTO backups (filename, filetype, filesize) VALUES ('Backup_May2024', 'sql', 15360);
INSERT INTO backups (filename, filetype, filesize) VALUES ('DB_Restore_June2024', 'sql', 12288);
INSERT INTO backups (filename, filetype, filesize) VALUES ('MainDB_Backup_July2024', 'sql', 40960);
INSERT INTO backups (filename, filetype, filesize) VALUES ('DB_Backup_August2024', 'sql', 20480);
INSERT INTO backups (filename, filetype, filesize) VALUES ('Backup_September2024', 'sql', 30720);
INSERT INTO backups (filename, filetype, filesize) VALUES ('DB_Restore_October2024', 'sql', 8192);
INSERT INTO backups (filename, filetype, filesize) VALUES ('MainDB_Backup_November2024', 'sql', 51200);
INSERT INTO backups (filename, filetype, filesize) VALUES ('DB_Backup_December2024', 'sql', 25600);
