BEGIN;
    /* All Transactions */

    /* 2019-01-01 through 2019-01-31 */
    CREATE VIEW "This Months Transactions" AS
        SELECT * FROM [Transactions View] 
            WHERE DATE BETWEEN 
                date('now','start of month')
                AND 
                date('now','start of month','+1 month','-1 day');

    /* 2018-12-01 through 2018-12-31 */
    CREATE VIEW "Last Months Transactions" AS
        SELECT * FROM [Transactions View] 
            WHERE DATE BETWEEN 
                date('now','start of month','-1 month')
                AND 
                date('now','start of month','-1 day');
		
    /* 2019-01-01 through 2019-12-31 */
    CREATE VIEW "This Years Transactions" AS
        SELECT * FROM [Transactions View] 
            WHERE DATE BETWEEN 
                date('now','start of year')
                AND
                date('now','start of year','+12 month','-1 day');
	
    /* 2018-01-01 through 2018-12-31*/
    CREATE VIEW "Last Years Transactions" AS
        SELECT * FROM [Transactions View] 
            WHERE DATE BETWEEN 
                date('now','start of year','-1 year')
                AND
                date('now','start of year','-1 day');
	
    /* Transaction Summaries */

    /* 2019-01-01 through 2019-01-31*/
    CREATE VIEW "Months Transactions Summary" AS
        SELECT "From","To", SUM(Amount) AS "Money",Count(*) AS "Number of Transactions" FROM [Transactions View] 
            WHERE DATE BETWEEN 
                date('now','start of month')
                AND 
                date('now','start of month','+1 month','-1 day')
            GROUP BY "From","To";
	
    /* 2018-12-01 through 2018-12-31 */
    CREATE VIEW "Last Months Transactions Summary" AS
        SELECT "From","To", SUM(Amount) AS "Money",Count(*) AS "Number of Transactions" FROM [Transactions View] 
            WHERE DATE BETWEEN 
                date('now','start of month','-1 month')
                AND 
                date('now','start of month','-1 day')
            GROUP BY "From","To";

    /* 2019-01-01 through 2019-12-31 */
    CREATE VIEW "This Years Transactions Summary" AS
        SELECT "From","To", SUM(Amount) AS "Money",Count(*) AS "Number of Transactions" FROM [Transactions View] 
            WHERE DATE BETWEEN 
                date('now','start of year')
                AND
                date('now','start of year','+12 month','-1 day')
            GROUP BY "From","To";

    /* 2018-01-01 through 2018-12-31 */	
    CREATE VIEW "Last Years Transactions Summary" AS 
        SELECT "From","To", SUM(Amount) AS "Money",Count(*) AS "Number of Transactions" FROM [Transactions View] 
            WHERE DATE BETWEEN 
                date('now','start of year','-1 year')
                AND
                date('now','start of year','-1 day')
            GROUP BY "From","To";
    
    PRAGMA user_version =  8;
COMMIT;