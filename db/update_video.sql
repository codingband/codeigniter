SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;

SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;

SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';



ALTER TABLE `core`.`facebook_user` CHANGE COLUMN `page_fan` `page_fan` TINYINT(1) NULL  ;



ALTER TABLE `core`.`video` DROP COLUMN `video_final` , ADD COLUMN `video_final` TINYINT(4) NULL DEFAULT 0  AFTER `user_id` , CHANGE COLUMN `status` `status` TINYINT(4) NULL  , CHANGE COLUMN `like` `like` INT(11) NULL DEFAULT 0  , CHANGE COLUMN `tweet` `tweet` INT(11) NULL DEFAULT 0  , CHANGE COLUMN `comment` `comment` INT(11) NULL DEFAULT 0  ;



ALTER TABLE `core`.`publication` CHANGE COLUMN `status` `status` TINYINT(4) NULL  ;



ALTER TABLE `core`.`send_attempt` CHANGE COLUMN `status` `status` TINYINT(4) NULL  ;





SET SQL_MODE=@OLD_SQL_MODE;

SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;

SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
