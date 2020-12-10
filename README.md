BACKGROUND INFORMATION
----------------------

When logged in as the administrator, the "Site Information" form can be found at the
path /admin/config/system/site-information.


REQUIREMENTS
------------

This module needs to alter the existing Drupal "Site Information" form. Specifics:
* A new form text field named "Site API Key" needs to be added to the "Site
Information" form with the default value of “No API Key yet”.
* When this form is submitted, the value that the user entered for this field should
be saved as the system variable named "siteapikey".
* A Drupal message should inform the user that the Site API Key has been saved
with that value.
* When this form is visited after the "Site API Key" is saved, the field should be
populated with the correct value.
* The text of the "Save configuration" button should change to "Update
Configuration".
* This module also provides a URL that responds with a JSON representation of a
given node with the content type "page" only if the previously submitted API Key
and a node id (nid) of an appropriate node are present, otherwise it will respond
with "access denied".
Example URL
http://localhost/page_json/FOOBAR12345/17Test 


EVALUATION
----------

* Meeting above requirements
* Utilising Drupal-specific solutions (hooks, APIs, etc.))
* Readability of code
* Clear, concise commenting
* List of resources used if any (Internet sites, books, previous knowledge)
* Total time to complete task

LIST OF RESOURCES
-----------------

* https://www.drupal.org/docs/develop/documenting-your-project/readme-template
* https://www.drupal.org/docs/creating-custom-modules
* https://api.drupal.org/api/drupal/core%21lib%21Drupal%21Core%21Form%21form.api.php/function/hook_form_FORM_ID_alter/8.2.x
* https://www.drupal.org/docs/drupal-apis/routing-system/structure-of-routes
* https://www.drupal.org/docs/8/api/routing-system/parameters-in-routes/using-parameters-in-routes
* https://drupal.stackexchange.com/questions/191419/drupal-8-node-serialization-to-json 
* https://www.drupal.org/docs/drupal-apis/configuration-api/configuration-schemametadata
* https://www.aram.cz/article/custom-permissions-drupal-8
* https://gist.github.com/mrded/6398654
* https://www.codementor.io/@nickbahson/reading-and-writing-to-drupal-8-config-18qlbj9l3m
* https://www.computerminds.co.uk/drupal-code/loading-config-programmatically
* https://drupalconsole.com/
* Drush

TASK COMPLETION TIME
--------------------

* Estimated time for completion of this module is around 4 hours if you are familiar with Drupal APIs.