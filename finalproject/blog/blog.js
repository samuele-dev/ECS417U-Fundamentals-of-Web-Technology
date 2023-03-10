// Method which checks if form is empty or not.
function validateForm(){
    // Store HTML elements in JavaScript variables.
    var title = document.forms["form"]["title"];
    var message = document.forms["form"]["message"];
    // Condition: If empty then do this...
    if(title.value == "" || title.value == null || message.value == "" || message.value == null){
        // Change the colour of field if no data is entered.
        if (title.value == "" || title.value == null) {
            alert("Title must be filled out.");
            title.style.border = "1px solid red";
        }
        if (message.value == "" || message.value == null) {
            alert("Message must be filled out.");
            message.style.border = "1px solid red";
        }
        // Prevent user from making submission and return false.
        event.preventDefault();
        return false;
    } // If successful show them a friendly message and return true.
    else{
        alert("Blog has been submitted.");
        return true;
    }
}
// Method that clears blog data.
function clearForm(){
    // Ask question - confirm pop up
    var userDecision = confirm("Clear blog title and message?");
    if(userDecision == true){
        // Remove data in field.
        document.getElementById("title").reset();
        document.getElementById("message").reset();
        // Inform them about this.
        alert("Blog has been cleared.");
    }
    else{
        // Stop data from being removed.
        event.preventDefault();
        alert("Blog has not been cleared.");
    }
}
// Moves the side navigation - For functionality.
/*Remember that margin is pointing left*/
function openSlideMenu(){
	document.getElementById('side-menu').style.width = '250px';
	/*document.getElementById('main').style.marginRight = '250px';*/
}
function closeSlideMenu(){
	document.getElementById('side-menu').style.width = '0';
	/*document.getElementById('main').style.marginRight = '0';*/
}