BEGIN;
    CREATE VIEW "Insurance View" AS 
        SELECT  "Accounts View".ID AS "ID",
            "Accounts View".Person AS "Institution",
            "Accounts View".Account AS "Account",
            "Accounts View".Status AS "Status",
            "Accounts View".Created AS "Created",
            "Accounts View".Closed AS "Closed",
            "Accounts View".Category AS "Category",
            Insurance."Face Value" AS "Face Value", 
            Insurance."Deductible" AS "Deductible",
            Insurance."Premium" AS "Yearly Premium"
            From "Accounts View" 
            INNER JOIN Insurance ON Insurance.ID = "Accounts View".ID;
    PRAGMA user_version =  5;
COMMIT;