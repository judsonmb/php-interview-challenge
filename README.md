# PHP Human Interview Challenge 

## Description
This project is designed to test your knowledge of the PHP language, and assess your ability to create back­end products with attention to details, standards, and re-usability.

## Assignment
Here you will find instructions on how to complete the API portion of the tech test. Please follow the setup instructions to get the API up and running.

## Setup Instructions

1. Fork this repository so that you have your own version in your GitLab account
  * Make sure that you mark your repository as public so that we can review it
2. Open your terminal and clone your fork (**DO NOT CLONE THE MAIN REPOSITORY!**)
3. `$ cp .env.example .env` (the example contains everything you need and needs no settings changed)
4. `$ docker run --rm -v "$(pwd)":/opt -w /opt composer:2 bash -c "composer install"`
5. `$ vendor/bin/sail up`
6. `$ vendor/bin/sail artisan key:generate`
7. `$ vendor/bin/sail artisan migrate --seed`
8. Visit [http://localhost:8042/api/v1](http://localhost:8042/api/v1) and you should see a response

## Goals
The goal of this exercise is to come up with a solution that is:
Testable; we should be able to test the internal application logic with no need to ever send a real email.
Flexible: we anticipate that the data source in the future could change from a flat file to a relational database, or perhaps a web service. We also anticipate that the email service could soon be replaced with a service that sends greetings through Facebook or some other social network.
Well-designed: separate clearly the business logic from the infrastructure.

## Mandatory Features
This is a REST API for animal facts. Currently, Cat Facts is the only resource this API provides.
Fix the cat facts storing: There is an error in the code, you should identify it and fix it. Don't forget to run all the necessary tests to make the CatFacts endpoints pass.
You can run $ vendor/bin/sail test to run the feature tests. All feature tests must pass in order to consider this a success.
Build storing dog facts: Following the conventions in place for working with Cat Facts, create the necessary infrastructure and endpoints to handle Dog Facts. This is an API, so all responses should be in JSON, and any request that accepts data should expect it to be in the JSON format. You should also create Feature tests for your endpoints. Below is the user story for Dog Facts.
Dog Facts User Story: As a user of the API, I should be able to list, retrieve, store, update, and delete Dog Facts so that I can help others learn about Dogs.

## Considerations
I should be able to retrieve a paginated list of Dog Facts
I should be able to specify the amount of Dog Facts per page
The default number of Dog Facts should be 25 (just like Cat Facts)
I should be able to request additional pages of Dog Facts

## Submission
After you have completed the tasks, please commit your local files and **push them up to your fork**. Notify the person
you have been working with that you have completed the test and provide them a link to **your** fork.
