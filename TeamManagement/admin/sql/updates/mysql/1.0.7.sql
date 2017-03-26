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
	posiiton VARCHAR(255),
	team_id INT(6) UNSIGNED NOT NULL, 
	FOREIGN KEY (team_id) REFERENCES teammanagement_teams(id)	
)