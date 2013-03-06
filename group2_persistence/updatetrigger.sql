-- DROP TABLE IF EXISTS `job`;
-- CREATE TABLE `job` (
--   `job_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
--   `state` int(11) NOT NULL DEFAULT '0',
--   `zombie_head` int(10) DEFAULT NULL,
--   `since_id_str` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL DEFAULT '0',
--   `query` varchar(255) NOT NULL,
--   `description` varchar(255) DEFAULT 'I am a lazy piece of shit and I did not enter a description',
--   `last_count` int(10) unsigned zerofill DEFAULT NULL,
--   `last_run` datetime DEFAULT NULL,
--   `analysis_state` int(11) DEFAULT '0',
--   PRIMARY KEY (`job_id`)
-- ) ENGINE=InnoDB AUTO_INCREMENT=2511 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

DROP TABLE IF EXISTS `job_tracking`;
Create Table `job_tracking` (
`tracking_id` Int Not Null Auto_Increment Primary Key,
`job_id` Int Not Null,
`field` VARCHAR(50) Not Null,
`old_value` Int Not Null,
`new_value` Int Not Null,
`modified` Datetime Not Null
) Engine=InnoDB AUTO_INCREMENT=2511 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

DELIMITER $$

DROP TRIGGER update_data $$

CREATE TRIGGER update_data AFTER UPDATE on job
FOR EACH ROW
BEGIN
    IF (NEW.state != OLD.state) THEN
        INSERT INTO job_tracking 
            (job_id , field , old_value , new_value , modified ) 
        VALUES 
            (NEW.job_id, "state", OLD.state, NEW.state, NOW());
    END IF;
    IF (NEW.zombie_head != OLD.zombie_head) THEN
        INSERT INTO job_tracking 
            (job_id , field , old_value , new_value , modified ) 
        VALUES 
            (NEW.job_id, "zombie_head", OLD.zombie_head, NEW.zombie_head, NOW());
    END IF;
END$$

DELIMITER ;