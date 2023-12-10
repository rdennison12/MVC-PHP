# MVC PHP Updated

## Commits
* Initial commit - Project and Repo created
* Beginning to organize files into the MVC folder structure
* Created autoload functionality - beginning stages
* Improved the Router class to use regEx to match routes
* Created the Dispatcher class
  * Includes methods to get arguments, controller and action names,
  * and checks if there is a namespace in the URL
* Created the Viewer class
* Enabled Dependency Injection (DI) to better handle the code
* Enabled strict_type to assist with troubleshooting
* Begin adding error and exception handling
* Finished adding error and exception handling
* Added configuration for $_ENV global to extract hardcoded information
* Beginning to add security to the framework
* Adding functions to retrieve a single record from the database
* Created a base Model class to make adding models easier
* Begin creating a form for inserting new records into the database
* Finished creating the form to insert a new record with validation
* Begin page to edit an existing record