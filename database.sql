CREATE DATABASE cmsoop;
USE cmsoop;

CREATE TABLE menu (
  menu_id int AUTO_INCREMENT PRIMARY KEY,
  name varchar(100),
  content text,
  published date
);

CREATE TABLE comments (
    comment_id int AUTO_INCREMENT PRIMARY KEY,
    menu_id int,
    CONSTRAINT menuid
    FOREIGN KEY (menu_id)
    REFERENCES menu(menu_id)
    ON DELETE CASCADE ON UPDATE CASCADE,
    nickname varchar(100) NOT NULL,
    content text NOT NULL,
    published date NOT NULL,
    approved bit DEFAULT 0
);
CREATE table administrators (
  id int AUTO_INCREMENT PRIMARY KEY,
  firstname varchar(20),
  surname varchar(20),
  username varchar(20),
  psw varchar(20)
);
INSERT INTO `administrators` (`id`, `firstname`, `surname`, `username`, `psw`) VALUES
(1, 'John', 'Smith', 'a', 'a');