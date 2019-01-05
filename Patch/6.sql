BEGIN;
    CREATE TABLE Bank (ID INTEGER, Routing TEXT, Account TEXT,FOREIGN KEY(ID) References Accounts(ID) );
    PRAGMA user_version =  7;
COMMIT;