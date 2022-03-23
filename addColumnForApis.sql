ALTER TABLE users ADD COLUMN api_token VARCHAR(80) default NULL UNIQUE after password;
