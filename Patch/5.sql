BEGIN;
    INSERT INTO Types (Category) VALUES ('Debt');
    PRAGMA user_version =  6;
COMMIT;