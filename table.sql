psql postgres

CREATE DATABASE travelposts;

\c travelposts;

CREATE TABLE posts (id SERIAL, title VARCHAR(100), body VARCHAR(500), location VARCHAR(30), image VARCHAR(50), year INT);

INSERT INTO posts (title, body, location, image, year) VALUES ('Title', 'Body', 'Rome, Italy', 'url', 2008);
INSERT INTO posts (title, body, location, image, year) VALUES ('Title', 'Body', 'Las Vegas, Nevada', 'url', 2007);
INSERT INTO posts (title, body, location, image, year) VALUES ('Title', 'Body', 'Arles, France', 'url', 2008);
