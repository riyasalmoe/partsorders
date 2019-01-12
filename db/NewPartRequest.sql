-- 
-- Set character set the client will use to send SQL statements to the server
--
SET NAMES 'utf8';

--
-- Set default database
--
USE partsorders;

DELIMITER $$

--
-- Create procedure `createRequest`
--
CREATE DEFINER = 'root'@'localhost'
PROCEDURE createRequest(
  
  )
BEGIN

  BEGIN TRANSACTION;

    INSERT INTO orderheader (JobCardNo,CustomerName,RequestedBy,RequestDate,RequestTime,Comments,LpoNumber)
      VALUES ()

  COMMIT;

END
$$

DELIMITER ;



    INSERT INTO orderheader (JobCardNo,CustomerName,RequestedBy,RequestDate,RequestTime,Comments,LpoNumber)
    VALUES (1234,'ALMOE FZE','riyas.a@almoe.com',CURRENT_DATE(),CURRENT_TIME(),'nothing','1111');

    INSERT INTO orderdetails (OrderID,PartNumber,PartName,ReqQty,ServiceType,LpoNumber,Brand)
    VALUES (2,'F123445','Print Head',2,'FOC/Warranty','NA','Epson');

    INSERT INTO orderitemstatus (OrderID,OrderDetailsID,Requested)
    VALUES (2,4,1);

    select * from orderheader;
    select * from orderdetails;
    select * from orderitemstatus;