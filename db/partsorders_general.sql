    INSERT INTO orderheader (JobCardNo,CustomerName,RequestedBy,RequestDate,RequestTime,Comments,LpoNumber)
    VALUES (1234,'ALMOE FZE','riyas.a@almoe.com',CURRENT_DATE(),CURRENT_TIME(),'nothing','1111');

    INSERT INTO orderdetails (OrderID,PartNumber,PartName,ReqQty,ServiceType,LpoNumber,Brand)
    VALUES (1,'F102','Pickup Roller',1,'Paid','NA','Epson');

    INSERT INTO orderitemstatus (OrderID,OrderDetailsID,Requested,ReqDate,ReqTime)
    VALUES (1,3,1,CURRENT_DATE(),CURRENT_TIME());

    UPDATE orderdetails set OrdQty=1,RecQty=1 where OrderDetailsID=3
    
    UPDATE  orderitemstatus SET 
      Ordered=1,OrdDate=CURRENT_DATE(),OrdTime=CURRENT_TIME,Arrived=1,ArrDate=CURRENT_DATE(),ArrTime=CURRENT_TIME()
    WHERE OrderDetailsID=3;

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

  CALL createRequest('1006','ABC CO.','riyas.a@almoe.com','1002','NA','HP0002','final2',1,'Warranty','HP');