BEGIN;
    DROP VIEW "My Accounts";
    CREATE VIEW "My Accounts" AS 
        Select Accounts.ID,Persons.Person,Accounts.Account,Status, 
        substr(Issued,1,4) ||'-'|| substr(Issued,5,2) ||'-'|| substr(Issued,7,2) AS "Created", 
        substr(Closed,1,4) ||'-'|| substr(Closed,5,2) ||'-'|| substr(Closed,7,2) AS "Closed", 
        Types.Category,Comments,Balance.Money AS 'Balance' From Accounts 
        INNER JOIN Persons ON Persons.ID = Accounts.Institution 
        INNER JOIN Types ON Types.ID = Accounts.Category 
        INNER JOIN Balance ON (Persons.Person|| ' ' || Types.Category) = Balance.Account 
        WHERE round(Balance,2) != 0 AND Accounts.Category != 1;
    
    PRAGMA user_version =  9;
COMMIT;