/*
Andrew Whitehead 400581822
March 29, 2025
Check if an email follows a minimally correct format
*/

/*
* After page loads, check validity of user's input email
* The input element takes care of feedback for the placement of the dot in an email
* Only check if there is a dot and the 'required' attribute takes care of the rest
* If there is no dot, tell user to add it, then prevent form submission
*/
window.addEventListener("load", function() {

    document.getElementById("form").addEventListener("submit", function (event) {
        let a = document.getElementById("email").value;
        let e = document.getElementById("error");
        let length = a.length - 1;
        let dot = false;
        console.log(length);
        
        for (i = 0; i <= length; i++) {
            if (a[i] == '.') {
                dot = true;
            }
        }

        if (dot != true) {
            e.innerHTML = "Ensure there is a dot after the @ and between two words (i.e. joe@hotmail.com)";
            e.style.color = 'red';
            event.preventDefault();
        }
    });
});