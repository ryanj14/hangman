CREATE TABLE Hangman
(
    id              INT(6)      UNSIGNED AUTO_INCREMENT PRIMARY KEY
    ,user           VARCHAR(30) NOT NULL
    ,pass           VARCHAR(255) NOT NULL
    ,score          INT(6)      NULL DEFAULT 0
);