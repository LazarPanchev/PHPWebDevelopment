/*Departments Info*/
SELECT department_id,
  COUNT(*) AS `Numbers of employees`
FROM employees
GROUP BY department_id
ORDER BY department_id, `Numbers of employees`;

/*Average salary*/
SELECT department_id,
  ROUND(AVG(salary),2) AS `Average Salary`
FROM employees
GROUP BY department_id
ORDER BY department_id;

/*addresses with towns*/
SELECT e.first_name, e.last_name, t.name AS town, a.address_text
FROM employees AS e
  JOIN addresses AS a
    ON e.address_id = a.address_id
  JOIN towns AS t
    ON a.town_id = t.town_id
ORDER BY e.first_name, e.last_name
LIMIT 5;

/*sales employee*/
SELECT e.employee_id, e.first_name, e.last_name, d.name AS `department_name`
FROM employees AS e
  INNER JOIN departments AS d
    ON e.department_id = d.department_id
WHERE d.name='Sales'
ORDER BY e.employee_id desc
LIMIT 5;

/*employees hired after*/
SELECT e.first_name, e.last_name, e.hire_date, d.name AS dept_name
FROM employees AS e
  JOIN departments AS d
    ON e.department_id = d.department_id
WHERE e.hire_date >= '1999-01-01 23:59:59'
      AND (d.name='Sales' OR d.name='Finance')
ORDER BY e.hire_date asc;

/*countries without any mountain*/
SELECT COUNT(*) AS `country_count`
FROM countries AS c
  LEFT JOIN mountains_countries AS mc
    ON c.country_code = mc.country_code
WHERE mc.mountain_id IS NULL;

/*min average salary*/
SELECT MIN(averages.AverageSalary) as min_average_salary
FROM
  (SELECT AVG(e.Salary) AS AverageSalary
   FROM Employees as e
   GROUP BY e.department_id) AS averages;