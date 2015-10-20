#Requirement specification 2015
Editor: Daniel Lundström

#Secure forum component for the web

##Supplementary specification
Secure Considerations:

- Javascript injections

#Use case 1: Click on item

##Main scenario
1. Starts when user clicks on an item
2. System check what item the user clicked on
3. System presents the item if it exist

##Alternative scenario
- 3a. The item doesn't exist anymore
  1. The system presents an error message that the item doesn't exist

#Use case 2: Go back to item list

##Main scenario
1. Starts when user wants to go back to the item list
2. System load the items
3. System presents the item list

#Use case 3: Go to create a new item site

##Main scenario
1. Starts when the user wants to create a new item
2. System navigate to create new item site

#Use case 4: Create a new item

##Precondition
The user is on the "Create a new item" site

##Main scenario
1. Starts when the user has created a new item
2. The system checks if everything is valid and filled in
3. The system add the item to the list
4. The system return the user to the item list

## Alternative scenarios
- 2a. The user has not filled in everything or haven't valid information
    1. System presents error message
    2. The user stays on the "Create a new item" site

#Use case 5: Remove an item

##Precondition
The user is on the "Show item" site

##Main scenario
1. Starts when the user clicks on the remove button
2. The system remove the current showing item from the item list
4. The system return the user to the item list