# Project 2 - Globitek Input/Output Sanitization

Time spent: 16 hours spent in total

## User Stories

The following **required** functionality is completed:

Staff CMS for Users:
--> index.php
- [x] Displays a list of all users in the database. The list includes the first name, last name
and username of each user and is sorted by last name then first name.
- [x] There is a link labeled "Add a User" at the top of the page.
- [x] Each user row has two links labeled "Show" and "Edit" which link to the appropriate pages.
- [x] On the page is a link labeled "Back to Menu" which links to the main menu.
--> show.php
- [x] Displays the user's full name, username, and email address.
- [x] On the page is a link labeled "Edit" which links to the appropriate page.
- [x] On the page is a link labeled "Back to List" which links to the list of users.
--> new.php
- [x] Displays a form for adding a new user.
- [x] The form includes text inputs for first name, last name, username, and email address.
- [x] Submitting the form will validate the data.
  [x] Validate that no values are left blank.
  [x] Validate that all string values are less than 255 characters long.
  [x] Validate that usernames contain only the whitelisted characters: A-Z, a-z, 0-9, and _
  [x] Validate that email addresses contain only whitelisted characters: A-Z, a-z, 0-9, and @._-
  [x] My Custom Validation: Validate that first and last names contain only the whitelisted characters: A-Z, a-z, 0-9, space, and .-
- [x] If validations fail, the form will display again with current values filled in and errors listed.
- [x] If validations pass, a new user will be added to the table and redirect to the user's information page.
- [x] On the page is a link labeled "Back to List" which links to the list of users.
--> edit.php
- [x] Displays a form for editing an existing user.
- [x] The form includes inputs for first name, last name, username, and email address.
- [x] The form is pre-populated with the user's current values.
- [x] Submitting the form will validate the data.
- [x] If validations fail, the form will display again with current values filled in and errors listed.
- [x] If validations pass, it will update the user's data in the table and redirect to the user's information page.
- [x] On the page is a link labeled "Cancel" which links to the user's information page.

Staff CMS for Salespeople:
--> index.php
- [x] Displays a list of all salespeople in the database. The list includes the first name and last name of each
salesperson and is sorted by last name then first name.
- [x] There is a link labeled "Add a Salesperson" at the top of the page.
- [x] Each salesperson row has two links labeled "Show" and "Edit" which link to the appropriate pages.
- [x] On the page is a link labeled "Back to Menu" which links to the main menu.
--> show.php
- [x] Displays a salesperson's full name, phone, and email address.
- [x] On the page is a link labeled "Edit" which links to the appropriate page.
- [x] On the page is a link labeled "Back to List" which links to the list of salespeople.
--> new.php
- [x] Displays a form for adding a new salesperson.
- [x] The form includes text inputs for first name, last name, phone, and email address.
- [x] Submitting the form will validate the data.
  [x] Validate that no values are left blank.
  [x] Validate that all string values are less than 255 characters long (because that is the maximum size for our SQL columns).
  [x] Validate that phone numbers contain only the whitelisted characters: 0-9, spaces, and ()-.
  [x] Validate that email addresses contain only whitelisted characters: A-Z, a-z, 0-9, and @._-.
  [x] My Custom Validation: Validate that phone number lengths is between 10 to 14 integers.
  [x] My Custom Validation: Validate that first and last names contain only the whitelisted characters: A-Z, a-z, 0-9, space, and .-
- [x] If validations fail, the form will display again with current values filled in and errors listed.
- [x] If validations pass, it will add a salesperson to the table and redirect to the salesperson's information page.
- [x] On the page is a link labeled "Back to List" which links to the list of salespeople.
--> edit.php
- [x] Displays a form for editing an existing salesperson.
- [x] The form includes inputs for first name, last name, phone, and email address.
- [x] The form is pre-populated with the salesperson's current values.
- [x] Submitting the form will validate the data.
- [x] If validations fail, the form will display again with current values filled in and errors listed.
- [x] If validations pass, it will update the salesperson's data in the table and redirect to the salesperson's
information page.
- [x] On the page is a link labeled "Cancel" which links to the salesperson's information page.

Staff CMS for States:
--> index.php
- [x] Displays a list of all states in the database. The list includes the name and code of each state and is sorted by name
- [x] There is a link labeled "Add a State" at the top of the page.
- [x] Each state row has two links labeled "Show" and "Edit" which link to the appropriate pages.
- [x] On the page is a link labeled "Back to Menu" which links to the main menu.
--> show.php
- [x] Displays a state's name, abbreviation code, and a list of the names of its territories. The territories list includes
the territory name and is sorted by position.
- [x] Each territory name is a link to a page to view more information about the territory.
- [x] On the page is a link labeled "Edit" which links to the appropriate page.
- [x] On the page is a link labeled "Back to List" which links to the list of states.
- [x] Below the territory list is a link labeled "Add a Territory" which is a link to the form for adding a new territory.
--> new.php
- [x] Displays a form for adding a new state.
- [x] The form includes text inputs for name and code.
- [x] Submitting the form will validate the data.
  [x] Validate that no values are left blank.
  [x] Validate that all string values are less than 255 characters long (because that is the maximum size for our SQL columns).
  [x] My Custom Validation: Validate that state names contain only the whitelisted characters: A-Z, a-z, 0-9, space, and .-
  [x] My Custom Validation: Validate that codes contain only the whitelisted characters: A-Z, a-z.
  [x] My Custom Validation: Validate that country IDs contain only integers.
  [x] My Custom Validation: Validate that country IDs are positive.
- [x] If validations fail, the form will display again with current values filled in and errors listed.
- [x] If validations pass, it will add a state to the table and redirect to the state's information page.
- [x] On the page is a link labeled "Back to List" which links to the list of states.
--> edit.php
- [x] Displays a form for editing an existing state.
- [x] The form includes inputs for name and code.
- [x] The form is pre-populated with the state's current values.
- [x] Submitting the form will validate the data.
- [x] If validations fail, it will display the form again with errors listed.
- [x] If validations pass, it will update the state's data in the table and redirect to the state's information page.
- [x] On the page is a link labeled "Cancel" which links to the state's information page.

Staff CMS for Territories:
--> index.php
- [x] Redirects all requests to the main menu.
--> show.php
- [x] Displays a territory's name, state_id, position.
- [x] On the page is a link labeled "Edit" which links to the appropriate page.
- [x] On the page is a link labeled "Back to State Details" which links to the state's information page.
--> new.php
- [x] Displays a form for adding a new territory to this state.
- [x] The form includes text inputs for name and position.
- [x] It does not have a state or state_id input. (The state ID should be present in form action URL and not in a form value.)
- [x] Submitting the form will validate the data.
  [x] Validate that no values are left blank.
  [x] Validate that all string values are less than 255 characters long (because that is the maximum size for our SQL columns).
  [x] My Custom Validation: Validate that territory names contains only the whitelisted characters: A-Z, a-z, 0-9, space, and .-
  [x] My Custom Validation: Validate that positions are integers.
  [x] My Custom Validation: Validate that positions are positive.
- [x] If validations fail, it will display the form again with errors listed.
- [x] If validations pass, it will add a territory to the table and redirect to the territory's information page.
Important note: it should automatically assign the new territory to the current state.
- [x] On the page is a link labeled "Back to State Details" which links to the state's information page.
--> edit.php
- [x] Displays a form for editing an existing territory.
- [x] The form includes inputs for name and position.
- [x] The form is pre-populated with the territory's current values.
- [x] It does not have an input for changing the territory's state assignment.
- [x] Submitting the form will validate the data.
- [x] If validations fail, it will display the form again with errors listed.
- [x] If validations pass, it will update the territory's data in the table and redirect to the territory's information page.
- [x] On the page is a link labeled "Cancel" which links to the territory's information page.

Validations:
- [x] Validate that no values are left blank.
- [x] Validate that all string values are less than 255 characters long (because that is the maximum size for our SQL columns).
- [x] Validate that usernames contain only the whitelisted characters: A-Z, a-z, 0-9, and _.
- [x] Validate that phone numbers contain only the whitelisted characters: 0-9, spaces, and ()-.
- [x] Validate that email addresses contain only whitelisted characters: A-Z, a-z, 0-9, and @._-.
- [x] My Custom Validation: Validate that names contain only the whitelisted characters: A-Z, a-z, 0-9, space, and .-
- [x] My Custom Validation: Validate that codes contain only the whitelisted characters: A-Z, a-z.
- [x] My Custom Validation: Validate that country IDs & positions contain only integers.
- [x] My Custom Validation: Validate that country IDs & positions are positive.
- [x] My Custom Validation: Validate that phone number lengths is between 10 to 14 integers.

Sanitization:
- [x] All input and dynamic output should be sanitized. (Tips)
- [x] Be sure to sanitize dynamic data when used for (URLs, HTML, SQL)

Penetration Testing:
- [x] Verify that all form text inputs are not vulnerable to XSS attacks. (Tips)
- [x] Verify that all URL query strings are not vulnerable to XSS attacks. (Tips)
- [x] Verify that all form text inputs are not vulnerable to SQLI attacks. (Tips)
- [x] Verify that all URL query strings are not vulnerable to SQLI attacks. (Tips)
- [x] Make a list of any other bugs or security vulnerabilities you are able to trigger by putting well-crafted data into a form value,
in a query string, or in the database data. You get to choose what avenues to probe. If a page acts in any way that was not intended, list it.
Then fix the problem if you know how. Include your list of discoveries in the README file that accompanies your assignment submission.

- Positions and Country IDs could be negative, which could make a pointer point out of the stack/out of bounds.
- Phone number too long = overflow
- Code & State IDs need to be sanitized
- === vs. == in checking if something is contained in a string and equals "false"
- Man in the middle attacks
- Passive & active eavesdroppers

The following advanced user stories are optional:
- [x] Bonus: On "public/staff/territories/show.php", instead of displaying an integer value for territories.state_id,
display the name of the state.
- [x] Bonus: Validate the uniqueness of users.username, both when a user is created and when a user is updated.
- [x] Bonus: Add a page for "public/staff/users/delete.php". Add a link to it from the user details page.
The delete page will display the text: "Are you sure you want to permanently delete the user: ". If the user confirms it,
delete the user record and redirect back to the users list.
- [x] Bonus: Add a Staff CMS for countries. (Creating a countries table was a bonus objective in last week's assignment.)
Add pages for "list", "show", "new", and "edit", similar to the pages in the CMS area for states.
- [x] Advanced: Nest the CMS for states inside of the Staff CMS for countries (created in the previous challenge).
It should be nested in the same way in which territories are nested inside of states.



## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='http://imgur.com/dL3tr6H' title='Video Walkthrough' width='' alt='Video Walkthrough' />

GIF created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

Describe any challenges encountered while building the app.

## License

    Copyright [Carmen Tang] [name of copyright owner]

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
