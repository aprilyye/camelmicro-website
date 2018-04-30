/* TODO: create tables */

/* TODO: initial seed data */
CREATE TABLE `applications` (
	`id`	INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT UNIQUE,
	`name`	TEXT,
	`image`	TEXT
);

INSERT INTO applications (name) VALUES ('Automotive');
INSERT INTO applications (name) VALUES ('Industrial');
INSERT INTO applications (name) VALUES ('Military and Aerospace');
INSERT INTO applications (name) VALUES ('Power Supply');
INSERT INTO applications (name) VALUES ('Computing and Peripherals');
INSERT INTO applications (name) VALUES ('LED Lighting');
INSERT INTO applications (name) VALUES ('Consumer');
INSERT INTO applications (name) VALUES ('Medical');
INSERT INTO applications (name) VALUES ('Portable and Wireless');
INSERT INTO applications (name) VALUES ('Motor Control');
INSERT INTO applications (name) VALUES ('Networking and Telecommunications');
