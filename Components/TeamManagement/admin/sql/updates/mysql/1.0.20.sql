CREATE TABLE IF NOT EXISTS teammanagement_teams(
	id INT(6) UNSIGNED AUTO_INCREMENT,
	name VARCHAR(255),
	shortname VARCHAR(255),
	image VARCHAR(255),
	PRIMARY KEY (id)
);

CREATE TABLE IF NOT EXISTS teammanagement_people(
	id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	firstname VARCHAR(255),
	lastname VARCHAR(255),
	position VARCHAR(255),
	peopleImage VARCHAR(255),
	`text` TEXT,
	number INT(6)
);

CREATE TABLE IF NOT EXISTS teammanagement_people_team(
	idPeople INT(6) UNSIGNED NOT NULL,
	idTeam INT(6) UNSIGNED NOT NULL,
    CONSTRAINT PK_PeopleTeam PRIMARY KEY (idPeople,idTeam),
	FOREIGN KEY (idPeople) REFERENCES teammanagement_people(id),
    FOREIGN KEY (idTeam) REFERENCES teammanagement_teams(id)
);