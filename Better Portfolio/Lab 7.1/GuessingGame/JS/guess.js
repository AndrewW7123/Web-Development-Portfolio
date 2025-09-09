/*
Andrew Whitehead
JavaScript for a guessing game of integers using classes and objects
*/

window.addEventListener("load", function() {

    class GuessingGame {
        constructor() {
            this.a = Math.floor(Math.random()* 100 + 1);
            this.c = 9;
        }
    
        guess(num) {
            let result = document.getElementById("result");

            if (this.c > 0) {
                if (num == this.a) {
                    result.innerHTML = "Correct! Great job! A new integer has been created";
                    user = new GuessingGame();
                    this.c = 9;
                }
                else if (num > this.a) {
                    result.innerHTML = "Your guess was too high";
                    this.c -= 1;
                }
                else {
                    result.innerHTML = "Your guess was too low";
                    this.c -= 1;
                }
            }
            else {
                result.innerHTML = "Incorrect. You have run out of guesses. Please try again!";
                this.c = 9;
            }
        }
    }

    let olduser;
    let user;

    if (localStorage.game) {
        olduser = JSON.parse(localStorage.game);
        user = new GuessingGame();
        user.a = olduser.a;
        user.c = olduser.c;
    }
    else {
        user = new GuessingGame;
    }
    
    function check(event) {
        let guess = document.getElementById("guess").value;
        guess = parseInt(guess);
        user.guess(guess);
        localStorage.game = JSON.stringify(user);
    }

    document.getElementById("submit").addEventListener("click", check);
});

