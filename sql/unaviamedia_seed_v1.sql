USE unaviamedia;

-- Delete any unnecessary records
DELETE FROM posts_categories;
DELETE FROM posts_tags;
DELETE FROM categories;
DELETE FROM tags;
DELETE FROM posts;
DELETE FROM users;

-- Create default administrator user (no password/salt yet)
INSERT INTO users( username, display_name, password, salt, email, first_name, last_name, date_joined, activated )
VALUES ( 'admin', 'admin', '', '', 'kroth@unaviamedia.ca', 'Kendall', 'Roth', default, 1 );

-- Create default categories
INSERT INTO categories( name, description )
VALUES
	( 'Portfolio', 'Posts related to the development of this portfolio site' ),
	( 'Development', 'Miscellaneous posts about things discovered while randomly developing' ),
	( 'Miscellaneous', 'Miscellaneous posts that don\'t fit into any other categories' );

-- Create default tags
INSERT INTO tags( name, description )
VALUES
	( 'Blog', 'Portfolio site blogging framework' ),
	( 'MVC', 'Portfolio site MVC framework' ),
	( 'Security', 'Portfolio site security framework' );

-- Create several initial posts
INSERT INTO posts( title, description, content, username, published )
VALUES
	( 'First Post', 'This is my first blog post!', '<h1>First Blog Post!</h1><p>This is my first post!</p>', 'admin', 1),
	( 'Test Post with Longer Title', 'This is a post with a longer title!', '<h1>Test Post</h1><p>Here is a blurb</p>', 'admin', 0),
	( 'Security Update', 'This is a security update', '<h1>Security Warning</h1><p>You aren\'t secure!</p>', 'admin', 1),
	( 'No Tags', 'This is a post without tags', '<h1>No Tags</h1><p>You have no tags!</p>', 'admin', 1);

-- Create several initial post_category relationships
INSERT INTO posts_categories
VALUES
	( 1, 'Miscellaneous' ),
	( 2, 'Miscellaneous' ),
	( 3, 'Portfolio' ),
	( 4, 'Miscellaneous' );

-- Create several initial post_flag relationships
INSERT INTO posts_tags
VALUES
	( 1, 'Blog' ),
	( 1, 'MVC' ),
	( 2, 'Blog' ),
	( 3, 'Security' );
