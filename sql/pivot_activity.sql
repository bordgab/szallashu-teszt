SET @sql = NULL;
SELECT
    GROUP_CONCAT(DISTINCT CONCAT(
            'CASE WHEN activity = "', companies.activity, '" THEN companyName END AS "', companies.activity, '"')
    )
INTO @sql
FROM teszt.companies;

SET @sql = CONCAT('SELECT ', @sql,
                  ' FROM companies GROUP BY companyName');
SELECT @sql;

PREPARE stmt FROM @sql;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;
