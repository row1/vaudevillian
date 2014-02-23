CREATE TABLE IF NOT EXISTS  `#__vaude_reviews` (
	`id` int NOT NULL auto_increment,
	`template_name` varchar(255) NOT NULL DEFAULT 'default',
	`rating` DECIMAL(5,1) NOT NULL default '0',
	`title` TEXT NOT NULL,
	`alias` varchar(255) NOT NULL,
	`introtext` mediumtext default NULL,
	`fulltext` mediumtext NOT NULL,
	`images` TEXT default NULL,
	`thumbnails` TEXT default NULL,
		
	`created` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    `created_by` INT NOT NULL,
	`created_by_alias` varchar(255) NOT NULL,
	
	`modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    `modified_by` INT DEFAULT NULL,
	`modified_by_alias` varchar(255) DEFAULT NULL,

    `publish_up` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
    `publish_down` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',				

	`user_review` tinyint NOT NULL default '0',
    `status` ENUM( 'pending', 'approved', 'rejected' ) NOT NULL DEFAULT 'pending',
    `status_reason` TEXT NULL,
    
	`metakey` TEXT NOT NULL DEFAULT '',
	`metadesc` TEXT NOT NULL DEFAULT '',
	`metadata` TEXT NOT NULL DEFAULT '',
	
	`access` int(10) unsigned NOT NULL DEFAULT '0',
  		
  			             
	FULLTEXT KEY idx_vaude_text (`introtext`, `fulltext`),
	INDEX idx_vaude_title (`title`(255)),
    INDEX idx_vaude_rating (`rating`),
	INDEX idx_vaude_created (`created`),
	INDEX idx_vaude_modified (`modified`),
	INDEX idx_vaude_published (`publish_up`, `publish_down`),
    PRIMARY KEY  (`id`)
)ENGINE=MYISAM DEFAULT CHARSET=utf8;