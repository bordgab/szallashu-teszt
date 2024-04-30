SET SESSION max_recursive_iterations = 10000;

WITH RECURSIVE seq (inc) AS (
    SELECT 1 AS inc UNION ALL SELECT inc + 1 FROM seq WHERE inc < DATEDIFF('2024-01-01', '2001-01-01')
)
SELECT DATE_FORMAT(DATE_ADD('2001-01-01', INTERVAL inc DAY), '%Y.%m.%d') AS `date`, GROUP_CONCAT(companyName)
FROM seq
         LEFT JOIN companies on companyFoundationDate = DATE_FORMAT(DATE_ADD('2001-01-01', INTERVAL inc DAY), '%Y.%m.%d')
GROUP BY `date`;
