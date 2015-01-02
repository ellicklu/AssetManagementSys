-- 1 create sequence table
DROP TABLE IF EXISTS `assets_management`.`asset_sequence`; 
CREATE TABLE  `assets_management`.`asset_sequence` ( 
`name` varchar(50) NOT NULL, 
`current_value` int(11) NOT NULL, 
`increment` int(11) NOT NULL DEFAULT '1', 
PRIMARY KEY (`name`) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8; 

-- 2 insert sequence info for table
insert into assets_management.asset_sequence values('Asset_Info',1,1); 
-- TODO: add more tables info

-- 3 create nextval function 
DELIMITER $$ 
DROP FUNCTION IF EXISTS `nextval` $$ 
CREATE DEFINER=`root`@`%` FUNCTION `nextval`(seq_name VARCHAR(50)) RETURNS int(11)
 BEGIN 
UPDATE asset_sequence 
SET current_value = current_value + increment 
WHERE name = seq_name; 
RETURN currval(seq_name); 
END $$ 
DELIMITER ; 

-- 4 create setval function
DELIMITER $$ 
DROP FUNCTION IF EXISTS `setval` $$ 
CREATE DEFINER=`root`@`%` FUNCTION `setval`(seq_name VARCHAR(50), value INTEGER) RETURNS int(11)
 BEGIN 
UPDATE asset_sequence 
SET current_value = value 
WHERE name = seq_name; 
RETURN currval(seq_name); 
END $$ 
DELIMITER ; 

-- 5 create currval function
DELIMITER $$ 
DROP FUNCTION IF EXISTS `currval` $$ 
CREATE DEFINER=`root`@`%` FUNCTION `currval`(seq_name VARCHAR(50)) RETURNS int(11)
 BEGIN 
  DECLARE value INTEGER; 
  SET value = 0; 
  SELECT current_value INTO value 
  FROM asset_sequence 
  WHERE name = seq_name; 
  RETURN value; 
END $$ 
DELIMITER ; 

-- 6 create trigger
DELIMITER $$
drop trigger if exists asset_info_trigger $$ 
create trigger asset_info_trigger before insert on Asset_Info 
for each row begin 
set new.I_SeqID = nextval('asset_info'); 
set new.D_Update_Date = CURRENT_TIMESTAMP;
if new.I_Asset_ID is null or new.I_Asset_ID = '' or new.I_Asset_ID = 0 THEN 
  set new.I_Asset_ID = new.I_SeqID;
end if; 
end $$ 
DELIMITER ; 
