DROP TABLE IF EXISTS `job`;
CREATE TABLE `job` (
  `job_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `state` int(11) NOT NULL DEFAULT '0',
  `zombie_head` int(10) DEFAULT NULL,
  `since_id_str` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
  `query` varchar(255) NOT NULL,
  `description` varchar(255) DEFAULT 'I am a lazy piece of shit and I did not enter a description',
  `last_count` int(10) unsigned zerofill DEFAULT NULL,
  `last_run` datetime DEFAULT NULL,
  `analysis_state` int(11) DEFAULT '0',
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2511 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

DROP TABLE IF EXISTS `hashtag`;
CREATE TABLE `hashtag` (
  `hashtag_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tweet_id` varchar(20) NOT NULL,
  `text` varchar(145) NOT NULL,
  `index_start` tinyint(3) unsigned NOT NULL,
  `index_end` tinyint(3) unsigned NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  `analysis_state` int(10) DEFAULT '0',
  PRIMARY KEY (`hashtag_id`),
  KEY `analysisindex` (`analysis_state`)
) ENGINE=InnoDB AUTO_INCREMENT=146665559 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

DROP TABLE IF EXISTS `mention`;
CREATE TABLE `mention` (
  `mention_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tweet_id` varchar(20) NOT NULL,
  `screen_name` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `id_str` varchar(45) NOT NULL,
  `index_start` tinyint(3) unsigned NOT NULL,
  `index_end` tinyint(3) unsigned NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  `analysis_state` int(10) DEFAULT '0',
  PRIMARY KEY (`mention_id`),
  KEY `analysis_state` (`analysis_state`)
) ENGINE=InnoDB AUTO_INCREMENT=102043292 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

DROP TABLE IF EXISTS `tweet`;
CREATE TABLE `tweet` (
  `tweet_id_str` varchar(20) NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  `created_at` datetime NOT NULL,
  `text` varchar(255) NOT NULL,
  `from_user` varchar(45) NOT NULL,
  `from_user_id_str` varchar(20) NOT NULL,
  `from_user_name` varchar(45) NOT NULL,
  `to_user` varchar(45) DEFAULT NULL,
  `to_user_id_str` varchar(20) DEFAULT NULL,
  `to_user_name` varchar(45) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `location_geo` point DEFAULT NULL,
  `location_geo_0` decimal(14,10) DEFAULT NULL,
  `location_geo_1` decimal(14,10) DEFAULT NULL,
  `iso_language` varchar(2) NOT NULL,
  `analysis_state` int(10) DEFAULT '0',
  PRIMARY KEY (`tweet_id_str`,`job_id`),
  KEY `archive` (`analysis_state`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

DROP TABLE IF EXISTS `url`;
CREATE TABLE `url` (
  `url_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `tweet_id` varchar(20) NOT NULL,
  `url` varchar(255) NOT NULL,
  `expanded_url` varchar(255) NOT NULL,
  `display_url` varchar(255) NOT NULL,
  `index_start` tinyint(3) unsigned NOT NULL,
  `index_end` tinyint(3) unsigned NOT NULL,
  `job_id` int(10) unsigned NOT NULL,
  `analysis_state` int(10) DEFAULT '0',
  PRIMARY KEY (`url_id`),
  KEY `analysis_state` (`analysis_state`)
) ENGINE=InnoDB AUTO_INCREMENT=39936178 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


DROP TABLE IF EXISTS `researcher_info`;
CREATE TABLE `researcher_info` (
  `researcher_id` int(11) NOT NULL,
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY (`researcher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;


DROP TABLE IF EXISTS `researcher_job`;
CREATE TABLE `researcher_job` (
  `researcher_job_id` int(11) NOT NULL,
  `jobs` varchar(140) NOT NULL,
  PRIMARY KEY (`researcher_job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

DROP TABLE IF EXISTS `tweet_count`;
create table tweet_count
as
select count(*) as last_count, a.query, b.job_id
from job a, tweet b
where a.job_id = b.job_id
group by a.query, b.job_id
order by last_count desc;
