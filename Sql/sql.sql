ALTER TABLE `CustomerLogon` ADD `Admin` BOOLEAN NOT NULL AFTER `DateLastModified`;

ALTER TABLE `Paintings` ADD `ReviewCount` INT NOT NULL AFTER `ReviewCount`;