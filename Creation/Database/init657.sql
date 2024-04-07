CREATE TABLE IF NOT EXISTS tags (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS product_tags (
    product_id INT,
    tag_id INT,
    FOREIGN KEY (product_id) REFERENCES products(id) ON DELETE CASCADE,
    FOREIGN KEY (tag_id) REFERENCES tags(id) ON DELETE CASCADE,
    PRIMARY KEY (product_id, tag_id)
);

INSERT INTO tags (name) VALUES ('Tag1');
INSERT INTO tags (name) VALUES ('Tag2');
INSERT INTO tags (name) VALUES ('Tag3');
INSERT INTO tags (name) VALUES ('Tag4');
INSERT INTO tags (name) VALUES ('Tag5');
INSERT INTO tags (name) VALUES ('Tag6');
INSERT INTO tags (name) VALUES ('Tag7');
INSERT INTO tags (name) VALUES ('Tag8');
INSERT INTO tags (name) VALUES ('Tag9');
INSERT INTO tags (name) VALUES ('Tag10');
