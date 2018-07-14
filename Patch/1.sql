ALTER TABLE Insurance ADD Deductible INTEGER;
ALTER TABLE Insurance ADD Premium INTEGER;

CREATE TABLE Loans (ID INTEGER,"Initial Amount" FLOAT,
	Balance FLOAT,
	API FLOAT,
	FOREIGN KEY(ID) References Accounts(ID));
	
PRAGMA user_version =  2;