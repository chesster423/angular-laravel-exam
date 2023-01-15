
![Logo](https://fusedsoftware.com/wp-content/uploads/2018/04/Logo-24.png)


# Laravel Coding Assessment

We have come up with the following task for you in order to do a quick Laravel test. 
Your understanding of PHP Design principles and how they are applied in the Laravel framework will be tested by this assessment. 
The test will include a few fundamental characteristics that almost all apps have. 

### This Laravel evaluation exam tells us if you possess the following characteristics.

- Experience in working on Laravel, a PHP framework
- Excellent working knowledge of Web application development
- Advance coding Skills in PHP, HTML, CSS, JavaScript, and scripting languages desirable
- Excellent working knowledge of MySQL database
- Experience in both Front End / Back End Development

## Let's Begin

### Primary Goal
1. Create order history page based on the given mockup design. 
2. Pull the data from the backend using REST API endpoint.
3. Implement authentication feature. 
4. Make sure that the API endpoints are available only for authenticated users. 

#### Setting up your local environment and project repository
- Setup your local environment and by pulling this repository from your local machine
- Create a new branch and named it "LaravelTest/{YourName}" !IMPORTANT!
- Setup your local database
- Run the migration by executing this `php artisan migrate`
- Run the seeders by executing this `php artisan test-data:install`

#### Tasks

##### PART 1 - Frontend
- Setup and implement the html elements and CSS to the given blade template to list the past orders/order history - DESIGN PROVIDED BELOW
- Add a function to the front-end to show the detailed order when they clicked the "View Details" button
- Add a function to the front-end to hide the detailed order when they clicked the "Hide Details" button or if they clicked another "View Details" button
- Setup the script that will connect to the backend to pull the data
- Create a CSS to apply responsiveness to this page

### Expected Output
![Expected](https://fusedsoftware.com/wp-content/uploads/2023/01/trial_task.jpg)

##### PART 2 - Backend
- Implement the authentication
- Create a route that can be used to get the data from the backend and all of these routes must implement the auth middleware
- Structure the model relationship in the backend - NOTE, please see the design below to understand where the data is to come from
- Create business logic to get the required data
- Response should be on JSON format

![Data Structure](https://fusedsoftware.com/wp-content/uploads/2023/01/trial_task_erd.jpg)

##### PART 3 - Unit Testing
- Build your test cases
- Write a Feature test covering the past order functionalities
- Write a Unit test covering the OrderHistory controller
- Example: it_can_return_a_list_of_past_orders, it_can_return_a_list_of_past_orders_based_on_the_authenticated_user and etc.

#### Notes
- On page load, there is no opened detailed past orders
- If they have the same meals it should add a count like "2 x {Meal Name}"

## Submission
Once you are done, push your changes, create a pull-request and send us an email to notify us you're done.

Also, in your PR notes, please include a screenshot of what the page looks like in your local.

## Your submission will be assessed on:
- Adherence to the above guidelines - please read them carefully
- Quality of the models
- Simplicity of the code and adherence to native Laravel functionality
- Whether your code works
- Completeness and accuracy of the design and responsiveness

## Tech Stack

**Client:** Ideally AngularJS, but VueJS is acceptable, CSS, HTML, jQuery, Javascript

**Server:** Laravel 8, PHP, MySQL

