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
* Finished the editing methods required to edit/delete an existing record
* Added functionality to protect data from being deleted from using the URL
* Encapsulated the Requests and Viewer to dynamically create them
* Begin building a templating solution
* Create the base MVC template with methods in the MVCTemplateViewer to getBlocks and replaceYields
* Completed building the templating engine for this application
  * Will look into creating error checking for missing blocks and ETC.
* Added a Response class for injecting a response in the controller(s)
  * This class injects a response from the controller class
* Created an Example Middleware - Completed
  * Will work to incorporate the registration form later