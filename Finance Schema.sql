PRAGMA foreign_keys = ON;
/*Create All the Tables :) */
CREATE TABLE Types (ID INTEGER PRIMARY KEY,Category TEXT);
CREATE TABLE Persons (ID INTEGER PRIMARY KEY,Person TEXT);

CREATE TABLE Accounts (ID INTEGER PRIMARY KEY,Institution INTEGER,
	Account TEXT,Status TEXT,Issued TEXT,
	Closed Text,Comments TEXT,Category INTEGER,
	FOREIGN KEY(Category) References Types(ID),
	FOREIGN KEY (Institution) REFERENCES Persons(ID));

/*Dirty Table. Needs Transition Code...*/
CREATE TABLE Credit (ID INTEGER,Maximum INTEGER,
	APR FLOAT,"Due Date" TEXT,
	FOREIGN KEY(ID) References Accounts(ID));
	
/*New Table*/
CREATE TABLE Loans (ID INTEGER,"Initial Amount"INTEGER,
	"Balance" INTEGER,
	"API" INTEGER,
	FOREIGN KEY(ID) References Accounts(ID));
	
/*Dirty Table. Needs Transition Code...*/
/*Currently not used*/
CREATE TABLE Insurance (ID INTEGER,"Face Value" INTEGER,
	"Deductible" INTEGER,
	"Premium" INTEGER,
	FOREIGN KEY(ID) References Accounts(ID));
	
CREATE TABLE Transactions ("ID" INTEGER PRIMARY KEY,Date TEXT,
	"From" INTEGER,"To" INTEGER,Amount Float,Memo TEXT,
	FOREIGN KEY ("From") References Accounts(ID),
	FOREIGN KEY ("TO") References Accounts(ID));
	
/* New Table */
CREATE TABLE Wallet (ID INTEGER PRIMARY KEY,"SERIAL" TEXT,Denomintation INTEGER);

/*Create Views*/
CREATE VIEW "Transactions Summary" AS 
	SELECT "From","To",SUM(AMOUNT) AS "Money",
	Count(*) AS "Number of Transactions"
	From "Transactions View" 
	GROUP BY "From","To";

CREATE VIEW "Transactions View" AS 
	Select substr(Date,1,4) ||'-'|| substr(Date,5,2) ||'-'|| substr(Date,7,2) AS "Date", 
		(CASE 
			WHEN Acc1.Category = 7 Then
				a1.Person
			Else 
				a1.Person || ' ' || T1.Category
		END) AS "From",
		(CASE
			WHEN Acc2.Category = 7 Then 
				a2.Person
			ELSE
				a2.Person || ' ' || T2.Category
		END) AS "To", 
	Amount,Memo,Transactions.ID From Transactions 
	Inner Join Accounts Acc1 ON Transactions."From" = Acc1.ID 
	Inner Join Accounts Acc2 ON Transactions."To" = Acc2.ID 
	Inner Join Persons a1 ON Acc1.Institution = a1.ID 
	Inner Join Persons a2 ON Acc2.Institution = a2.ID 
	Inner Join Types T1 ON Acc1.Category = T1.ID 
	Inner Join Types T2 ON Acc2.Category = T2.ID 
	ORDER BY DATE;

/* Includes General Accounts */
CREATE VIEW "Accounts View" AS 
	Select Accounts.ID,Persons.Person,Accounts.Account,Status,
	(CASE 
		WHEN Issued IS NULL THEN
			(SELECT MIN(DATE) FROM Transactions WHERE "From" = Accounts.ID OR "To" =Accounts.ID)
		ELSE
			substr(Issued,1,4) ||'-'|| substr(Issued,5,2) ||'-'|| substr(Issued,7,2) 
	END) AS "Created",
	(CASE
		WHEN Closed IS NULL THEN
			(SELECT MAX(DATE) FROM Transactions WHERE "From" = Accounts.ID OR "To" =Accounts.ID)
		ELSE
			substr(Closed,1,4) ||'-'|| substr(Closed,5,2) ||'-'|| substr(Closed,7,2) 
	END) AS "Closed",
	Types.Category,Comments From Accounts 
	INNER JOIN Persons ON Persons.ID = Accounts.Institution 
	INNER JOIN Types ON Types.ID = Accounts.Category
	;
	
/*Does not include General Accounts or accounts that have zero balance*/
CREATE VIEW "My Accounts" AS 
	Select Accounts.ID,Persons.Person,Accounts.Account,Status,
	substr(Issued,1,4) ||'-'|| substr(Issued,5,2) ||'-'|| substr(Issued,7,2) AS "Created",
	substr(Closed,1,4) ||'-'|| substr(Closed,5,2) ||'-'|| substr(Closed,7,2) AS "Closed",
	Types.Category,Comments,Balance.Money AS 'Balance' From Accounts 
	INNER JOIN Persons ON Persons.ID = Accounts.Institution 
	INNER JOIN Types ON Types.ID = Accounts.Category
	INNER JOIN Balance ON (Persons.Person|| ' ' ||  Types.Category) = Balance.Account
	WHERE round(Balance,2) != 0;
	;
	
CREATE VIEW "My Inactive Accounts" AS 
	Select Accounts.ID,Persons.Person,Accounts.Account,Status,
	substr(Issued,1,4) ||'-'|| substr(Issued,5,2) ||'-'|| substr(Issued,7,2) AS "Created",
	substr(Closed,1,4) ||'-'|| substr(Closed,5,2) ||'-'|| substr(Closed,7,2) AS "Closed",
	Types.Category,Comments,round(Balance.Money,2) AS 'Balance' From Accounts 
	INNER JOIN Persons ON Persons.ID = Accounts.Institution 
	INNER JOIN Types ON Types.ID = Accounts.Category
	INNER JOIN Balance ON (Persons.Person|| ' ' ||  Types.Category) = Balance.Account
	WHERE round(Balance,2) = 0;
	;
	
CREATE VIEW "Credit View" AS 
	SELECT  "Accounts View".ID AS "ID",
	"Accounts View".Person AS "Institution",
	"Accounts View".Account AS "Account",
	"Accounts View".Status AS "Status",
	"Accounts View".Created AS "Created",
	"Accounts View".Closed AS "Closed",
	"Accounts View".Category AS "Category",
	abs(Balance.Money) AS "Current Balance",
	Credit.Maximum AS "Maximum", 
	round( ( (abs(Balance.Money) * 1.0) / (Credit.Maximum *1.0)) * 100,4) ||'%' AS 'Percentage Used' 
	From "Accounts View" 
	INNER JOIN CREDIT ON Credit.ID = "Accounts View".ID
	INNER JOIN Balance ON 
	("Accounts View".Person || ' ' ||  "Accounts View".Category) = Balance.Account;

CREATE VIEW Balance AS Select "Account",Sum(Money) AS 'Money' FROM 
	( 
		Select "From" AS "Account", 
			SUM( 
				CASE 
					When Money >= 0 Then -1 * Money 
					Else Money 
				END ) AS 'Money' From "Transactions Summary" GROUP BY "From" 
		UNION 
		Select "To" AS "Account", 
			SUM( 
				CASE 
					When Money <= 0 Then -1 * Money 
					Else Money 
				END ) AS 'Money' FROM "Transactions Summary" GROUP BY "To" 
	) 
	Group By "Account";

INSERT INTO Types (Category) VALUES ('Insurance'); 
INSERT INTO Types (Category) VALUES ('Credit Card'); 
INSERT INTO Types (Category) VALUES ('Checking'); 
INSERT INTO Types (Category) VALUES ('Savings'); 
INSERT INTO Types (Category) VALUES ('Student Loans');
INSERT INTO Types (Category) VALUES ('Debit Card');
INSERT INTO Types (Category) VALUES ('General');
INSERT INTO Types (Category) VALUES ('Cash');
INSERT INTO Types (Category) VALUES ('E-Money');

PRAGMA user_version =  2;