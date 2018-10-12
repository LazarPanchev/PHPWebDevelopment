-- USE WIZZARD_DEPOSITS TABLE FROM GRINGOTTS DATABASE

-- record's count
SELECT COUNT(*) AS count
FROM wizzard_deposits;

-- longest magic wand
SELECT MAX(magic_wand_size) AS `longest_magic_wand`
FROM wizzard_deposits;

-- longest magic wand per deposit groups
SELECT deposit_group, MAX(magic_wand_size) AS `longest_magic_wand`
FROM wizzard_deposits
GROUP BY deposit_group
ORDER BY longest_magic_wand asc, deposit_group asc;

-- smallest deposit group per magic wand size
SELECT deposit_group
FROM wizzard_deposits
GROUP BY deposit_group
ORDER BY AVG(magic_wand_size)
LIMIT 1;

-- deposits sum
SELECT deposit_group, SUM(deposit_amount) AS total_sum
FROM wizzard_deposits
GROUP BY deposit_group
ORDER BY total_sum asc;

-- appetizers count
SELECT COUNT(category_id)
FROM products
WHERE category_id=2 AND price>8;

-- menu prices
SELECT category_id, ROUND(AVG(price),2) AS `Average Price`,
 MIN(price) AS `Cheapest Product`, MAX(price) AS `Most Expensive Product`
 FROM products
 GROUP BY category_id;


-- USE SOFT_UNI DATABASE

 -- employee addresses
 SELECT e.employee_id, e.job_title, e.address_id, a.address_text
FROM employees e
INNER JOIN addresses a
ON e.address_id = a.address_id
ORDER BY e.address_id ASC
LIMIT 5;

-- employee departments
SELECT e.employee_id, e.first_name, e.salary, d.name AS department_name
FROM employees AS e
JOIN departments AS d
ON e.department_id = d.department_id
WHERE e.salary>15000
ORDER BY e.department_id desc
LIMIT 5;

-- employees without project
SELECT e.employee_id, e.first_name
FROM employees AS e
LEFT JOIN employees_projects AS ep
ON e.employee_id = ep.employee_id
WHERE ep.project_id IS NULL
ORDER BY e.employee_id desc
LIMIT 3;

-- employee 24
SELECT e.employee_id, e.first_name,
CASE
 WHEN p.start_date>'2005' THEN NULL
 ELSE p.name
 END AS project_name
FROM employees_projects AS ep
JOIN employees AS e
ON e.employee_id = ep.employee_id
JOIN projects AS p
ON p.project_id = ep.project_id
WHERE e.employee_id=24
ORDER BY project_name;

-- employee manager
SELECT e.employee_id, e.first_name, m.employee_id, m.first_name AS manager_name
FROM employees AS e
INNER JOIN employees AS m
ON e.manager_id = m.employee_id
WHERE m.employee_id=3 OR m.employee_id=7
ORDER BY e.first_name asc;

-- employee summary
SELECT e.employee_id,
CONCAT(e.first_name,' ',e.last_name) AS employee_name,
 CONCAT (m.first_name,' ', m.last_name) AS manager_name,
 d.name AS department_name
FROM employees AS e
JOIN employees AS m
ON e.manager_id =m.employee_id
JOIN departments AS d
ON e.department_id = d.department_id
ORDER BY e.employee_id
LIMIT 5;

