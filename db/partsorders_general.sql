    INSERT INTO orderheader (JobCardNo,CustomerName,RequestedBy,RequestDate,RequestTime,Comments,LpoNumber)
    VALUES (1234,'ALMOE FZE','riyas.a@almoe.com',CURRENT_DATE(),CURRENT_TIME(),'nothing','1111');

    INSERT INTO orderdetails (OrderID,PartNumber,PartName,ReqQty,ServiceType,LpoNumber,Brand)
    VALUES (1,'F123445','Print Head',2,'FOC/Warranty','NA','Epson');

    INSERT INTO orderitemstatus (OrderID,OrderDetailsID,Requested,ReqDate,ReqTime)
    VALUES (1,1,1,CURRENT_DATE(),CURRENT_TIME());

    select * from orderheader;
    select * from orderdetails;
    select * from orderitemstatus;

--     SET FOREIGN_KEY_CHECKS = 0; 
--     TRUNCATE TABLE orderitemstatus;
--     TRUNCATE TABLE  orderdetails;
--     TRUNCATE TABLE  orderheader;
--     SET FOREIGN_KEY_CHECKS = 1;

--     DELETE FROM orderdetails;

--   select @@version;

  SELECT * FROM view_all_requests;

  CALL getMyRequests('riyas.a@almoe.com');