CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', '$2y$10$SiMeWN5fvvnVLDyNt4DS.eDH7/VlBcql6B8aLZvlJklMkqmHAKb/i'); -- Password: password123
INSERT INTO users (username, password) VALUES ('jane_smith', '$2y$10$lHw8sFgqaQgG8vmtA7htj.ABYL3SvQhS0G5Z4unJmDIgEA4De6g0W'); -- Password: pass123
INSERT INTO users (username, password) VALUES ('mark_jackson', '$2y$10$nvGV5f2q3yF0GSw0Rl3ey.Nw.RQdtF9s04oM.PC1pDPgor/jknyXq'); -- Password: securepass
INSERT INTO users (username, password) VALUES ('emily_white', '$2y$10$FZzlnmDFh2w8SrOMLspH2.q3Yvide2lqwQwA/fNNWqCiT2JH9a59G'); -- Password: mypass123
INSERT INTO users (username, password) VALUES ('alex_smith', '$2y$10$VLPtxGxfUzJMUwGMWXXXzeAkb3aQJ.ryHCwGm6cl2S1Zl6QROPXnO'); -- Password: password2022
INSERT INTO users (username, password) VALUES ('sarah_jones', '$2y$10$VRyFxFt6p1RUM0iBKmIscOtrj4L51Ech4aCj/uGzxL8L1V1UzGSoe'); -- Password: pass321
INSERT INTO users (username, password) VALUES ('michael_roberts', '$2y$10$B36S3G.Vv.LuYE/LwzqHVOCQc5sENNbf2JX6kUbG1cs3KZ8N9T9C6'); -- Password: secure2022
INSERT INTO users (username, password) VALUES ('lisa_taylor', '$2y$10$EzGh8Gh3Z7F8g2QXe.Q8m.z891ZE2g2b2sT9nRgwcL8TKJkCT6U2e'); -- Password: mypass2022
INSERT INTO users (username, password) VALUES ('david_miller', '$2y$10$VrwbK.JVunxNvP7XDs3W3uofNU95O3ucHc1RLUN7Yt/S3K7W/fheS'); -- Password: mypass456
INSERT INTO users (username, password) VALUES ('olivia_james', '$2y$10$Atjo7MooBB0lfJgUdTM//OIzFVubQsO.GRSYxYyFDSb8J7xcC4plS'); -- Password: secure_pass
