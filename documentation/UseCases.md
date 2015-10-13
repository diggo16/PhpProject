#Requirement specification 2015
Editor Daniel Lundström

#Secure forum component for the web

##Supplementary specification
Secure Considerations
-Javascript injections

#Use case 1: Click on forum article

##Main scenario
1. Starts when user clicks on an article
2. System check what article the user clicked on
3. System presents the article if it exist

##Alternative scenario
- 3a. The article doesn't exist anymore
  1. The system presents an error message that the article doesn't exist

#Use case 2: Go back to article list

##Main scenario
1. Starts when user wants to go back to the article list
2. System load the articles
3. System presents the article list

#Use case 3: Go to create a new article site

##Main scenario
1. Starts when the user wants to create a new article
2. System navigate to create new article site

#Use case 4: Create a new Article

##Precondition
The user is on the "Create a new article" site

##Main scenario
1. Starts when the user has created a new article
2. The system checks if everything is valid and filled in
3. The system add the article to the list
4. The system return the user to the article list

## Alternative scenarios
- 2a. The user has not filled in everything or haven't valid information
    1. System presents error message
    2. The user stays on the "Create a new article" site