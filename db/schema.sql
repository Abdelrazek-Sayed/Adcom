CREATE TABLE services (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    name VARCHAR(255) NOT NULL,
    `desc` TEXT NOT NULL,
    created_at DATETIME NOT NULL DEFAULT now(),
    PRIMARY KEY (id)
);

CREATE TABLE projects (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    projectname VARCHAR(255) NOT NULL,
    clienttname VARCHAR(255) NOT NULL,
    `desc` TEXT NOT NULL,
    img  VARCHAR(50) NOT NULL,
    service_id INT UNSIGNED NOT NULL ,
    `date` DATE NOT NULL,
    PRIMARY key (id),
    FOREIGN KEY (service_id) REFERENCES services(id) 
);

CREATE  TABLE users(
id INT UNSIGNED NOT NULL AUTO_INCREMENT ,
name VARCHAR(255) NOT NULL,
email  VARCHAR(255) NOT NULL,
`subject` VARCHAR(60) NOT NULL,
`message`  text NOT  NULL ,
created_at DATETIME NOT NULL DEFAULT now(),
PRIMARY key (id) 
);

CREATE TABLE admins (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT ,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL ,
    `password` VARCHAR(100) NOT NULL,
    created_at DATETIME NOT NULL DEFAULT now(),
PRIMARY key (id)
)