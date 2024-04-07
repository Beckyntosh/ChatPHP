CREATE TABLE jobs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    type VARCHAR(50) NOT NULL
);

INSERT INTO jobs (title, description, type) VALUES ('Remote Software Developer', 'Looking for experienced software developers to work remotely on exciting projects.', 'remote');
INSERT INTO jobs (title, description, type) VALUES ('Onsite Project Manager', 'Seeking a dynamic individual to lead project teams on-site and ensure project success.', 'onsite');
INSERT INTO jobs (title, description, type) VALUES ('Hybrid UI/UX Designer', 'Employing a talented UI/UX designer to work both remotely and on-site for a collaborative design experience.', 'hybrid');
INSERT INTO jobs (title, description, type) VALUES ('Remote Data Analyst', 'Opportunity for a skilled data analyst to work remotely and analyze complex datasets.', 'remote');
INSERT INTO jobs (title, description, type) VALUES ('Onsite Sales Representative', 'Join our team as an onsite sales representative and drive sales growth with your enthusiastic approach.', 'onsite');
INSERT INTO jobs (title, description, type) VALUES ('Hybrid Marketing Specialist', 'Looking for a creative marketing specialist who can work in-office and remotely to develop engaging marketing campaigns.', 'hybrid');
INSERT INTO jobs (title, description, type) VALUES ('Remote Content Writer', 'Seeking a talented content writer to create engaging and informative content from any location.', 'remote');
INSERT INTO jobs (title, description, type) VALUES ('Onsite Customer Support Agent', 'Join our team on-site as a customer support agent to provide exceptional service to our clients.', 'onsite');
INSERT INTO jobs (title, description, type) VALUES ('Hybrid Graphic Designer', 'Opportunity for a graphic designer to work both remotely and on-site, creating visually stunning designs.', 'hybrid');
INSERT INTO jobs (title, description, type) VALUES ('Remote IT Specialist', 'Looking for an IT specialist to work remotely and provide technical support and solutions.', 'remote');
