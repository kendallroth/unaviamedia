-- Create generic site database if it doesn't exist
DROP DATABASE IF EXISTS unaviamedia;

CREATE DATABASE IF NOT EXISTS unaviamedia;

USE unaviamedia;

-- Create user tables
CREATE TABLE IF NOT EXISTS users (
	username		VARCHAR(50) 	NOT NULL,
	display_name	VARCHAR(50)		NOT NULL UNIQUE,
	password		VARCHAR(100)	NOT NULL,
	salt			VARCHAR(100)	NOT NULL,
	email			VARCHAR(150)	UNIQUE,
	first_name		VARCHAR(25) 	NOT NULL,
	last_name		VARCHAR(25) 	NOT NULL,
	date_joined		DATETIME		NOT NULL DEFAULT CURRENT_TIMESTAMP,
	activated		BIT				NOT NULL DEFAULT 0,
	CONSTRAINT pk_users
		PRIMARY KEY (username)
);

-- Blog Specific Tables

-- Create posts table
CREATE TABLE IF NOT EXISTS posts (
	id				INT				AUTO_INCREMENT,
	title			VARCHAR(150)	NOT NULL UNIQUE,
	description		TEXT			NOT NULL,
	content			LONGTEXT		NOT NULL,
	author			VARCHAR(50)		NOT NULL,
	date_created	DATETIME		NOT NULL DEFAULT CURRENT_TIMESTAMP,
	date_modified	DATETIME		NOT NULL DEFAULT CURRENT_TIMESTAMP,
	published		TINYINT			NOT NULL DEFAULT 0,
	CONSTRAINT pk_posts
		PRIMARY KEY (id),
	CONSTRAINT fk_users_posts
		FOREIGN KEY (author) REFERENCES users(username)
);

-- Create categories table (broader post type categories)
CREATE TABLE IF NOT EXISTS categories (
	name		VARCHAR(50)	NOT NULL,
	description	TINYTEXT,
	CONSTRAINT pk_categories
		PRIMARY KEY (name)
);

-- Create categories to posts membership table
CREATE TABLE IF NOT EXISTS posts_categories (
	post_id		INT,
	category	VARCHAR(50),
	CONSTRAINT fk_posts_categories_posts
		FOREIGN KEY (post_id) REFERENCES posts(id),
	CONSTRAINT fk_posts_categories_categories
		FOREIGN KEY (category) REFERENCES categories(name)
);

-- Create tags table (more specific blog tags)
CREATE TABLE IF NOT EXISTS tags (
	name		VARCHAR(50)	NOT NULL,
	description	TINYTEXT,
	CONSTRAINT pk_tags
		PRIMARY KEY (name)
);

-- Create tags to posts membership table
CREATE TABLE IF NOT EXISTS posts_tags (
	post_id	INT,
	tag	VARCHAR(50),
	CONSTRAINT fk_posts_tags_posts
		FOREIGN KEY (post_id) REFERENCES posts(id),
	CONSTRAINT fk_posts_tags_tags
		FOREIGN KEY (tag) REFERENCES tags(name)
);
