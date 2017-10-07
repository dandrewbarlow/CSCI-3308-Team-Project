create table if not exists users (
	user_id int(11) not null auto_increment,
	user_name varchar(255) not null,
	user_email varchar(255) not null,
	user_uid varchar(255) not null,
	psswd varchar(255) not null,
	primary key(id)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=7;

insert into users (user_id, user_name, user_email, user_id, psswd)
	values
	(1, 'Admin', 'apve4733@colorado.edu', 'pi', 'PiInTheSky');
