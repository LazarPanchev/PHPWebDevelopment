
/* find all information about departments*/
SELECT * FROM DEPARTMENTS ORDER BY DEPARTMENT_ID ASC;

/* find all department names  */
SELECT name FROM departments ORDER BY department_id ASC;

/* find salary of each employee*/
SELECT first_name, last_name, salary
FROM employees
ORDER BY employee_id asc;

/* find full name of each employee*/
SELECT first_name, middle_name, last_name
FROM employees
ORDER BY employee_id asc;

/* find email address of each employee*/
SELECT CONCAT (first_name,'.', last_name, '@softuni.bg')
  AS full_email_address
FROM employees;

/* find all different employee's salaries*/
SELECT DISTINCT salary
FROM employees
ORDER BY salary asc

/* find all information about employees*/
SELECT * FROM employees
WHERE job_title = 'Sales Representative'
ORDER BY employee_id;

/*find names of all employees by salary in range*/
SELECT first_name, last_name, job_title
FROM employees
WHERE salary>=20000 and salary<=30000
Order BY employee_id asc;

/*find names of all employees*/
SELECT CONCAT(first_name,' ', middle_name,' ', last_name)
  AS `full name`
FROM employees
WHERE salary IN ('25000', '14000', '12500', '23600');

/*find all employees without manager*/
SELECT first_name, last_name
FROM employees
WHERE manager_id IS NULL;

/* find all employees with salary more than*/
SELECT first_name, last_name, salary
FROM employees
WHERE salary>50000
ORDER BY salary desc;

/*find 5 best paid employees*/
SELECT first_name, last_name
FROM employees
ORDER BY salary desc
LIMIT 5;

/*find all employees except marketing*/
SELECT first_name, last_name
FROM employees
WHERE NOT department_id = 4;

/* sort employees table*/
SELECT *
FROM employees
ORDER BY salary desc, first_name asc, last_name desc, middle_name asc;

/* distinct job title*/
SELECT DISTINCT (job_title)
FROM employees
ORDER BY job_title asc;

/* find first 10 started projects*/
SELECT *
FROM projects
ORDER BY start_date asc, name asc
LIMIT 10;

/* last 7 hired employees*/
SELECT first_name, last_name, hire_date
FROM employees
ORDER BY hire_date desc
LIMIT 7;

/* increase salaries*/
UPDATE employees
SET salary = salary + (salary * 0.12)
WHERE department_id IN (1, 2, 4, 11);

SELECT salary
FROM employees;

/* all mountain peaks*/
SELECT peak_name
FROM peaks
ORDER BY peak_name;

/* biggest countries in population*/
SELECT country_name, population
FROM countries
WHERE continent_code = 'EU'
ORDER BY population desc, country_name asc
LIMIT 30;

/* countries and currency (Euro/not euro)*/
SELECT country_name, country_code,
  IF (currency_code='EUR', 'Euro', 'Not Euro')
FROM countries
ORDER BY country_name asc;

