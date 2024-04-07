CREATE TABLE quiz (
    id INT AUTO_INCREMENT PRIMARY KEY,
    question VARCHAR(255) NOT NULL,
    option_a VARCHAR(255) NOT NULL,
    option_b VARCHAR(255) NOT NULL,
    option_c VARCHAR(255) NOT NULL,
    option_d VARCHAR(255) NOT NULL,
    correct_answer CHAR(1) NOT NULL
);

INSERT INTO quiz (question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('Question 1', 'Option A1', 'Option B1', 'Option C1', 'Option D1', 'a');
INSERT INTO quiz (question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('Question 2', 'Option A2', 'Option B2', 'Option C2', 'Option D2', 'b');
INSERT INTO quiz (question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('Question 3', 'Option A3', 'Option B3', 'Option C3', 'Option D3', 'c');
INSERT INTO quiz (question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('Question 4', 'Option A4', 'Option B4', 'Option C4', 'Option D4', 'd');
INSERT INTO quiz (question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('Question 5', 'Option A5', 'Option B5', 'Option C5', 'Option D5', 'a');
INSERT INTO quiz (question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('Question 6', 'Option A6', 'Option B6', 'Option C6', 'Option D6', 'b');
INSERT INTO quiz (question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('Question 7', 'Option A7', 'Option B7', 'Option C7', 'Option D7', 'c');
INSERT INTO quiz (question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('Question 8', 'Option A8', 'Option B8', 'Option C8', 'Option D8', 'd');
INSERT INTO quiz (question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('Question 9', 'Option A9', 'Option B9', 'Option C9', 'Option D9', 'a');
INSERT INTO quiz (question, option_a, option_b, option_c, option_d, correct_answer) VALUES ('Question 10', 'Option A10', 'Option B10', 'Option C10', 'Option D10', 'b');
