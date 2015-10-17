#Test cases
##Test case 1.1: Show forum items
Show all the items in a table

###Input:
- Navigate to page

###Output:
- Title is shown
- All the Items are shown
- A create new item button is shown

##Test case 1.2 Successfully show an item
Show an item when you click on it

###Input:
-Item title clicked

###Output:
- Title is shown
-The title of the item that was clicked is shown
-The text of the item that was clicked is shown

##Test case 1.3 Clicked on item that no longer exists
Show error message if the item that is clicked no longer exists

###Input:
-Item title clicked

###Output:
- Title is shown
- Error message
- All the Items are shown

##Test case 1.4 Show create new item form
Navigate to create new item window when the button is clicked

###Input:
- Create new item button is clicked

###Output:
- Title is shown
- Item form is shown
- Create button is shown

##Test case 1.5 Failed create new item with too short title

###Input:
- Add button is pushed
- Title is shorter than the limit

###Output:
- Test case 1.4
- Error message

##Test case 1.6 Failed create new item with too long title

###Input:
- Add button is pushed
- Title is longer than the limit

###Output:
- Test case 1.4
- Error message

##Test case 1.7 Failed create new item with too short author

###Input:
- Add button is pushed
- Author is shorter than limit

###Output:
- Test case 1.4
- Error message

##Test case 1.8 Failed create new item with too short text

###Input:
- Add button is pushed
- Text is shorter than limit

###Output:
- Test case 1.4
- Error message
