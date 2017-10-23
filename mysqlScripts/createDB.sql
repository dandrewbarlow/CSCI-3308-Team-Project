create table if not exists users (
	user_id int(11) not null auto_increment,
	user_name varchar(255) not null,
	user_email varchar(255) not null,
	user_uid varchar(255) not null,
	psswd varchar(255) not null,
	primary key(user_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;

insert into users (user_id, user_name, user_email, user_uid, psswd)
	values
	(1, 'Admin', '', 'god', 'be39f9ab6be772aa81422ea983664c9e');


create table if not exists websites (
	site_id int(11) not null auto_increment,
	user_uid varchar(255) not null,
	created_on date(255) not null,
	website_name varchar(255) not null,
	is_domain bit(1) not null,
	is_enabled bit(1) not null,
	src_path varchar(999) not null,
	primary key(site_id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;
