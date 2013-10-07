
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

#-----------------------------------------------------------------------------
#-- users
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users`;


CREATE TABLE `users`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	`login` VARCHAR(255)  NOT NULL,
	`password` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- rights
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `rights`;


CREATE TABLE `rights`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- groups
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `groups`;


CREATE TABLE `groups`
(
	`id` INTEGER  NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255)  NOT NULL,
	PRIMARY KEY (`id`)
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- users_rights
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_rights`;


CREATE TABLE `users_rights`
(
	`user_id` INTEGER  NOT NULL,
	`right_id` INTEGER  NOT NULL,
	PRIMARY KEY (`user_id`,`right_id`),
	CONSTRAINT `users_rights_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `rights` (`id`)
		ON DELETE CASCADE,
	INDEX `users_rights_FI_2` (`right_id`),
	CONSTRAINT `users_rights_FK_2`
		FOREIGN KEY (`right_id`)
		REFERENCES `users` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

#-----------------------------------------------------------------------------
#-- users_groups
#-----------------------------------------------------------------------------

DROP TABLE IF EXISTS `users_groups`;


CREATE TABLE `users_groups`
(
	`user_id` INTEGER  NOT NULL,
	`groups_id` INTEGER  NOT NULL,
	PRIMARY KEY (`user_id`,`groups_id`),
	CONSTRAINT `users_groups_FK_1`
		FOREIGN KEY (`user_id`)
		REFERENCES `groups` (`id`)
		ON DELETE CASCADE,
	INDEX `users_groups_FI_2` (`groups_id`),
	CONSTRAINT `users_groups_FK_2`
		FOREIGN KEY (`groups_id`)
		REFERENCES `users` (`id`)
		ON DELETE CASCADE
)Type=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
