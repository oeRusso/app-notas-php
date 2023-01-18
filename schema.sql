CREATE TABLE notes (
    id int NOT NULL AUTO_INCREMENT,
    uuid varchar(255) NOT NULL UNIQUE,
    tittle varchar(255) NOT NULL,
    content text NOT NULL,
    update date NOT NULL,
    PRIMARY KEY (id)
);