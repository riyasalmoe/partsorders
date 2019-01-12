USE partsorders;

DROP VIEW view_all_requests CASCADE;

CREATE 
	DEFINER = 'root'@'localhost'
VIEW view_all_requests
AS
SELECT
  `orderheader`.`OrderID` AS `OrderID`,
  `orderheader`.`JobCardNo` AS `JobCardNo`,
  `orderheader`.`CustomerName` AS `CustomerName`,
  `orderheader`.`RequestedBy` AS `RequestedByID`,
  `users`.`FullName` AS `FullName`,
  `orderheader`.`Comments` AS `HeaderComment`,
  `orderdetails`.`OrderDetailsID` AS `OrderDetailsID`,
  `orderdetails`.`PartNumber` AS `PartNumber`,
  `orderdetails`.`PartName` AS `PartName`,
  `orderdetails`.`ReqQty` AS `ReqQty`,
  `orderdetails`.`OrdQty` AS `OrdQty`,
  `orderdetails`.`RecQty` AS `RecQty`,
  `orderdetails`.`ServiceType` AS `ServiceType`,
  `orderdetails`.`Brand` AS `Brand`,
  `orderitemstatus`.`Requested` AS `Requested`,
  `orderitemstatus`.`ReqDate` AS `RequestDate`,
  `orderitemstatus`.`ReqTime` AS `RequestTime`,
  `orderitemstatus`.`Acknowledged` AS `Acknowledged`,
  `orderitemstatus`.`AckDate` AS `AckDate`,
  `orderitemstatus`.`AckTime` AS `AckTime`,
  `orderitemstatus`.`Approved` AS `Approved`,
  `orderitemstatus`.`AppDate` AS `AppDate`,
  `orderitemstatus`.`AppTime` AS `AppTime`,
  `orderitemstatus`.`Ordered` AS `Ordered`,
  `orderitemstatus`.`OrdDate` AS `OrdDate`,
  `orderitemstatus`.`OrdTime` AS `OrdTime`,
  `orderitemstatus`.`Arrived` AS `Arrived`,
  `orderitemstatus`.`ArrDate` AS `ArrDate`,
  `orderitemstatus`.`ArrTime` AS `ArrTime`,
  `orderitemstatus`.`ReleaseRequest` AS `ReleaseRequest`,
  `orderitemstatus`.`RelReqDate` AS `RelReqDate`,
  `orderitemstatus`.`RelReqTime` AS `RelReqTime`,
  `orderitemstatus`.`Released` AS `Released`,
  `orderitemstatus`.`RelDate` AS `RelDate`,
  `orderitemstatus`.`RelTime` AS `RelTime`,
  `orderitemstatus`.`Comments` AS `ItemComment`,
  `orderitemstatus`.`ETA` AS `ETA`
FROM (((`orderitemstatus`
  JOIN `orderheader`
    ON ((`orderitemstatus`.`OrderID` = `orderheader`.`OrderID`)))
  JOIN `orderdetails`
    ON (((`orderdetails`.`OrderID` = `orderheader`.`OrderID`)
    AND (`orderitemstatus`.`OrderDetailsID` = `orderdetails`.`OrderDetailsID`))))
  LEFT JOIN `users`
    ON ((`users`.`EmailAddress` = `orderheader`.`RequestedBy`)));