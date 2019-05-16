-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE partsorders;

--
-- Drop procedure `createRequest`
--
DROP PROCEDURE IF EXISTS createRequest;

--
-- Set default database
--
USE partsorders;

DELIMITER $$

--
-- Create procedure `createRequest`
--
CREATE DEFINER = 'root'@'localhost'
PROCEDURE createRequest(IN _JobCardNo VARCHAR(20),
  IN _CustomerName VARCHAR(255),
  IN _UserID VARCHAR(100),
  IN _LpoNumber VARCHAR(20),
  IN _Comments VARCHAR(255),
  IN _PartNumber VARCHAR(255),
  IN _PartName VARCHAR(255),
  IN _ReqQty BIGINT,
  IN _ServiceType VARCHAR(100),
  IN _Vendor VARCHAR(100) -- ,
  -- OUT _result BIT
  )
--   SET autocommit = 0

 BEGIN
  DECLARE _result BIT;
  DECLARE EXIT HANDLER FOR SQLEXCEPTION 
    BEGIN
        ROLLBACK;
        -- EXIT PROCEDURE;
        SET _result = 0;
    END;

    
    
    START TRANSACTION;
      BEGIN

      INSERT INTO orderheader (JobCardNo, CustomerName, RequestedBy, RequestDate, RequestTime, Comments, LpoNumber)
        SELECT _JobCardNo, _CustomerName, _UserID, CURRENT_DATE(), CURRENT_TIME(), _Comments, _LpoNumber
        WHERE NOT EXISTS (SELECT JobCardNo FROM orderheader WHERE JobCardNo = _JobCardNo) LIMIT 1;
      
      SELECT 
          OrderID INTO @OrderHeaderID
      FROM orderheader
      WHERE JobCardNo = _JobCardNo;
      
      INSERT INTO orderdetails (OrderID, PartNumber, PartName, ReqQty, ServiceType, LpoNumber, Brand)
        VALUES (@OrderHeaderID, _PartNumber, _PartName, _ReqQty, _ServiceType, _LpoNumber, _Vendor);
      
      SELECT MAX(OrderDetailsID) INTO
        @OrderDetailsID
      FROM orderdetails
      WHERE OrderID = @OrderHeaderID;
      
      INSERT INTO orderitemstatus (OrderID, OrderDetailsID, Requested, ReqDate, ReqTime)
        VALUES (@OrderHeaderID, @OrderDetailsID, 1, CURRENT_DATE(), CURRENT_TIME());
        
        
            END;
    COMMIT;
  
    SET _result = 1;
--     SET autocommit = 1;

    SELECT _result;
END
$$

DELIMITER ;