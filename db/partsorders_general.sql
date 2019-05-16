--     INSERT INTO orderheader (JobCardNo,CustomerName,RequestedBy,RequestDate,RequestTime,Comments,LpoNumber)
--     VALUES (1234,'ALMOE FZE','riyas.a@almoe.com',CURRENT_DATE(),CURRENT_TIME(),'nothing','1111');
-- 
--     INSERT INTO orderdetails (OrderID,PartNumber,PartName,ReqQty,ServiceType,LpoNumber,Brand)
--     VALUES (1,'F102','Pickup Roller',1,'Paid','NA','Epson');
-- 
--     INSERT INTO orderitemstatus (OrderID,OrderDetailsID,Requested,ReqDate,ReqTime)
--     VALUES (1,3,1,CURRENT_DATE(),CURRENT_TIME());
-- 
--     UPDATE orderdetails set OrdQty=1,RecQty=1 where OrderDetailsID=3
--     
--     UPDATE  orderitemstatus SET 
--       Ordered=1,OrdDate=CURRENT_DATE(),OrdTime=CURRENT_TIME,Arrived=1,ArrDate=CURRENT_DATE(),ArrTime=CURRENT_TIME()
--     WHERE OrderDetailsID=3;
-- 
--     select * from orderheader;
--     select * from orderdetails;
--     select * from orderitemstatus;

--     SET FOREIGN_KEY_CHECKS = 0; 
--     TRUNCATE TABLE orderitemstatus;
--     TRUNCATE TABLE  orderdetails;
--     TRUNCATE TABLE  orderheader;
--     SET FOREIGN_KEY_CHECKS = 1;
-- 
--     DELETE FROM orderdetails;

--   select @@version;

  SELECT * FROM view_all_requests;
    select * from orderdetails;
    select * from orderitemstatus;

-- 
--   CALL getMyRequests('riyas.a@almoe.com');
-- 
--   CALL createRequest('1008','ABC CO.','riyas.a@almoe.com','1002','NA','HP0002','final2',1,'Warranty','HP',@result);
--   select @result;
-- 
--   CALL createRequest('dksfjdklfj','lkjlkj','riyas.a@almoe.com','ljlkj','','dd','dd',3,'0','Epson',@result);
--     select @result;
-- 
--     CALL createRequest('2222','dksljflskdjf','riyas.a@almoe.com','34343','kjklj','kjkj','kjkj',1,'0','Epson',@Outresult);Select @Outresult as _result
-- 
-- CALL getMyJobRequests('1234');
-- 
-- 
--     SELECT * FROM users;
--       SELECT * from roles;
--         SELECT * from userroles;
-- 
-- 
--         CALL getUserRights('riyas.a@almoe.com');

-- CALL partsorders.markUnmarkOrder(1,1,0)
-- 
--             UPDATE orderitemstatus SET Ordered = 1,OrdDate = CURRENT_DATE(),OrdTime = CURRENT_TIME()
--           WHERE OrderID = 1 AND OrderDetailsID = 1 LIMIT 1;