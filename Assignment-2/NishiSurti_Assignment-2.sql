-- Part 1: Basic queries with SELECT


-- 1.Using the order_details table, find the revenue (price * quantity) earned on each order. 

SELECT OrderNumber, (QuotedPrice*QuantityOrdered) as Revenue from Order_Details GROUP BY OrderNumber;

-- 2.Using the employees table, find the age of each employee in years and order from youngest to oldest. NOTE: You do not have to account for leap years. 

SELECT EmpFirstName, EmpLastName, timestampdiff(YEAR, EmpBirthDate, CURRENT_DATE) as Age FROM Employees order by timestampdiff(YEAR, EmpBirthDate, CURRENT_DATE) ASC


-- Part 2: Conditional queries

-- 1.	Using the employees table, find all employees with a first name that contains an 'r' and a last name that does not contain a 'p'. 

SELECT EmpFirstName, EmpLastName FROM Employees where EmpFirstName like '%r%' AND EmpLastName not like '%p%'

-- Part 4: Joins
-- 1.	Find the first name and last name of all customers who have ever ordered a helmet. 

SELECT DISTINCT Customers.CustFirstName, Customers.CustLastName, Customers.CustPhoneNumber, Products.ProductNumber, Products.ProductName from Customers
join Orders ON Orders.CustomerID = Customers.CustomerID
join Order_Details ON Order_Details.OrderNumber = Orders.OrderNumber
join Products ON Products.ProductNumber = Order_Details.ProductNumber 
where Products.ProductName like '%helmet%'

-- 2.	Display the last name of all customers who have the same last name as an employee. 

SELECT CustLastName FROM customers where CustLastName IN(SELECT EmpLastName from Employees);


-- Part 5: Aggregate Functions 

-- 2. Find the combined total value (QuantityOrdered*QuotedPrice) of all orders made by customers from the state of 'OR' 

SELECT CustState, (QuotedPrice*QuantityOrdered) as Total from Order_Details 
join Orders ON Order_Details.OrderNumber = Orders.OrderNumber 
join Customers ON Orders.CustomerID = Customers.CustomerID 
WHERE CustState = 'OR'
