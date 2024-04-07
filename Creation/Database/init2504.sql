CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
premium_feature_access BOOLEAN DEFAULT false,
reg_date TIMESTAMP
);

INSERT INTO users (username, password, premium_feature_access, reg_date) VALUES ('user1', '$2y$10$T9zApfon1L7pwWaQRDkY9Ojz8yQs/tb9JLR/L6PtDtHNesseixVRe', 1, CURRENT_TIMESTAMP);
INSERT INTO users (username, password, premium_feature_access, reg_date) VALUES ('user2', '$2y$10$7kiYExbdwPq9CYGe8AXZq.cjeH3E0RYvakZh7ncsEf8xKIkvUdooK', 0, CURRENT_TIMESTAMP);
INSERT INTO users (username, password, premium_feature_access, reg_date) VALUES ('user3', '$2y$10$JeXOwHj1Np2yiZvV6BfSoOQW4xUqOK6EnqsTWDVplnZZC3f0qM0fi', 1, CURRENT_TIMESTAMP);
INSERT INTO users (username, password, premium_feature_access, reg_date) VALUES ('user4', '$2y$10$WA5NTRPqrIX16Qbd.FwWW.VUIiDGqT9t7GNyj0x/ykP6Ockl/qxuS', 0, CURRENT_TIMESTAMP);
INSERT INTO users (username, password, premium_feature_access, reg_date) VALUES ('user5', '$2y$10$gjN/gDm9Q3IDN1I5BiSxheHVf1KX.NGiY6PYRXk6TpbRnzVX7aey2', 1, CURRENT_TIMESTAMP);
INSERT INTO users (username, password, premium_feature_access, reg_date) VALUES ('user6', '$2y$10$7KnDfeZ8r5LI7.Th/.T/vuMQtoTWdnoKyRtye40Vfkt7GxusTqL/K', 0, CURRENT_TIMESTAMP);
INSERT INTO users (username, password, premium_feature_access, reg_date) VALUES ('user7', '$2y$10$AzAq1xTCun4FBCu99eCen.muC0tZQvKRm8Wz4hETs17hbH3uUOQNa', 1, CURRENT_TIMESTAMP);
INSERT INTO users (username, password, premium_feature_access, reg_date) VALUES ('user8', '$2y$10$0IYc/tQcAbnYDe7UnUC7zOlTUnH0DESis9LTSyw7tHn6qpUi5mwYO', 0, CURRENT_TIMESTAMP);
INSERT INTO users (username, password, premium_feature_access, reg_date) VALUES ('user9', '$2y$10$JU.0iwYo2yRh4E0OdL9YjeW1uz13mV2ssBKi5JF.ZBBSdkZJwCBOa', 1, CURRENT_TIMESTAMP);
INSERT INTO users (username, password, premium_feature_access, reg_date) VALUES ('user10', '$2y$10$gXp4cgnnzZiDwXHbEFc.SOxnzIGeASxxGQFhY2dG2JEx4Vnz/TV3O', 0, CURRENT_TIMESTAMP);