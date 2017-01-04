-- Create generic site database if it doesn't exist
CREATE DATABASE IF NOT EXISTS unaviamedia;

USE unaviamedia;

-- Create user tables
CREATE TABLE IF NOT EXISTS users (
	username		VARCHAR(50) NOT NULL,
	display_name	VARCHAR(50)	NOT NULL UNIQUE,
	first_name		VARCHAR(25) NOT NULL,
	last_name		VARCHAR(25) NOT NULL,
	date_joined		DATETIME	NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT pk_username
		PRIMARY KEY (username)
);

-- Blog Specific Tables 

-- Create posts table
CREATE TABLE IF NOT EXISTS posts (
	id				INT				AUTO_INCREMENT,
	title			VARCHAR(150)	NOT NULL UNIQUE,
	description		TEXT			NOT NULL,
	content			LONGTEXT		NOT NULL,
	username		VARCHAR(50)		NOT NULL,
	date_created	DATETIME		NOT NULL DEFAULT CURRENT_TIMESTAMP,
	date_modified	DATETIME		NOT NULL DEFAULT CURRENT_TIMESTAMP,
	CONSTRAINT pk_id
		PRIMARY KEY (id),
	CONSTRAINT fk_username
		FOREIGN KEY (username) REFERENCES users(username)
);

-- Create categories table
CREATE TABLE IF NOT EXISTS categories (
	name		VARCHAR(50)	NOT NULL,
	description	TINYTEXT,
	CONSTRAINT pk_name
		PRIMARY KEY (name)
);

-- Create categories to posts membership table
CREATE TABLE IF NOT EXISTS posts_categories (
	post_id		INT,
	category	VARCHAR(50),
	CONSTRAINT fk_post_id	
		FOREIGN KEY (post_id) REFERENCES posts(id),
	CONSTRAINT fk_category
		FOREIGN KEY (category) REFERENCES categories(name)
);

