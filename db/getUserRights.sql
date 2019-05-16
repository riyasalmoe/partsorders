-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE partsorders;

--
-- Drop procedure `getUserRights`
--
DROP PROCEDURE IF EXISTS getUserRights;

--
-- Set default database
--
USE partsorders;

DELIMITER $$

--
-- Create procedure `getUserRights`
--
CREATE DEFINER = 'root'@'localhost'
PROCEDURE getUserRights(
  IN _UserID VARCHAR(100))
--   SET autocommit = 0

  BEGIN

  select RoleID,RoleName
  from view_all_users 
  where UserID = _UserID;

  END
$$

DELIMITER ;