-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE partsorders;

--
-- Drop procedure `getmyRequests`
--
DROP PROCEDURE IF EXISTS getmyRequests;

--
-- Set default database
--
USE partsorders;

DELIMITER $$

--
-- Create procedure `getmyRequests`
--
CREATE DEFINER = 'root'@'localhost'
PROCEDURE getmyRequests(IN _RequestedByID VARCHAR(100))
BEGIN
SELECT
  OrderID,
  JobCardNo,
  CustomerName,
  RequestedByID,
  FullName,
  HeaderComment,
  OrderDetailsID,
  PartNumber,
  PartName,
  ReqQty,
  OrdQty,
  RecQty,
  ServiceType,
  Brand,
  Requested,
  DATE_FORMAT(RequestDate, '%d-%b-%X') RequestDate,
  RequestTime,
  Acknowledged,
  AckDate,
  AckTime,
  Approved,
  AppDate,
  AppTime,
  Ordered,
  OrdDate,
  OrdTime,
  Arrived,
  ArrDate,
  ArrTime,
  ReleaseRequest,
  RelReqDate,
  RelReqTime,
  Released,
  RelDate,
  RelTime,
  ItemComment,
  ETA
FROM partsorders.view_all_requests
WHERE RequestedByID = _RequestedByID
  ORDER BY RequestDate DESC,RequestTime DESC;
END
$$

DELIMITER ;