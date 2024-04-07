CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO users (username, email, password) VALUES ('john_doe', 'john.doe@example.com', '$2y$10$Tn7lKPw6rmN19rMqn1ZLB.NTFl/2cTBXAuBq9kjEyc5N21nNu7yw6'),
('jane_smith', 'jane.smith@example.com', '$2y$10$NiWaxfLVMu6Q5DSH8iZlXe0dmRml7GUS2Xwf4ByKY5hv258Ms.4Uu'),
('mark_jackson', 'mark.jackson@example.com', '$2y$10$7jLAv4giFgkWMDGk7h4ntOBVvo/f/GyOApTa3WyDwvnwOYPaKgfwm'),
('sarah_adams', 'sarah.adams@example.com', '$2y$10$tOQUzGLPzRhupTe6Jllx0u57twwajW4S28sI1V6wixJv9OIn7aUCC'),
('alex_roberts', 'alex.roberts@example.com', '$2y$10$HmII0i3G01yh/2X3UB7w/.5B.UFO69qWj6MReLe6NqnNtu6GxlxjO'),
('olivia_miller', 'olivia.miller@example.com', '$2y$10$3oCNPsg3oK23JtFWejILdu.LP2vuYmHtB2.309F1Xmd1Qh64Ly6Vq'),
('david_clark', 'david.clark@example.com', '$2y$10$pW.6otQLFUmXe28IPKegkeB7yIvQWrU6v2I5sdF6A4EziG.C3OaLO'),
('amy_carter', 'amy.carter@example.com', '$2y$10$HMgZIeJxXys.lPHHZjcq2uHo0CuB.9GqbM0tJQZRV6zH7xAzEzKba'),
('luke_hall', 'luke.hall@example.com', '$2y$10$9pFxykCtHXznhEnWldg0ue5hUyjQ1A69ce9Ek3I8tJoK.Hl3GH85O'),
('emily_lewis', 'emily.lewis@example.com', '$2y$10$HAQsKb9dEh35eMa/wEB/l.bWcP.6sSgmpGm4lO9dBADLffW7YpbRq');
