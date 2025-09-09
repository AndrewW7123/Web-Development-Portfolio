/*
Andrew Whitehead (Student Number: 400581822)
Feb 20, 2025
JavaScript program outlining a simple memory game and how it will run
*/

// Wait until page load to run any functions
// All game functionality contained within window function
window.addEventListener("load", function(event) {

    // For keeping track of clicked cards
    let active = 0;
    let first = '';
    let second = '';
    let won = 0;

    // Set the round number to a variable for win conditions
    let round = 'Round 1';

    // User's score
    let points = 0;

    // For game personalization
    let name = '';
    let age = '';
    let colorCard = '';
    let tiles = '';

    // For instructions button
    let helpOn = false;

    // For click event restrictions
    let cooldown = false;

    // Create and load audio objects
    let flipFX = new Audio("SFX/cardflip.mp3");
    let pairFX = new Audio("SFX/pair.mp3");
    let roundFX = new Audio("SFX/roundwin.mp3");
    flipFX.load();
    pairFX.load();
    roundFX.load();

    // Add 'click' event listeners to all image cards for round 1
    let cards = document.querySelectorAll(".card");
    for (let card of cards) {
        card.addEventListener("click", opac);
    }

    /* 
    * Display game elements, score and menu button
    * Hide intro page and customize cards color based on input
    * gameStart runs based on a click event from the 'Submit and Play' button (intro page)
    * There is no return value
    */
    function gameStart(event) {
        age = document.getElementById("age").value;
        name = document.getElementById("name").value;
        if ((age > 0) && (age < 100) && (name.length > 0)) {
            document.getElementById("intro").style.display = "none";
            document.getElementById("menu").style.visibility = "visible";
            document.getElementById("score").style.visibility = "visible";
            document.getElementById("diff").innerHTML = "Round 1";
            document.getElementById("main").style.display = "block";
            document.getElementById("valid").innerHTML = '';
            colorCard = document.getElementById("cardCol").value;
            tiles = document.getElementsByClassName("tile");

            for (let tile of tiles) {
                tile.style.backgroundColor = colorCard;
            }
        }
        else {
            document.getElementById("valid").innerHTML = "Please enter a valid name and age";
        }
        
    }
    document.getElementById("submit").addEventListener("click", gameStart);

    /*
    * Make clicked card's image visible. If 2 clicked cards' images are identical, 
    * keep them visible and remove click listeners, oherwise hide their visibilities
    * opac runs based on a click event on any of the image cards, no return value
    */
    function opac(event) {
        if (cooldown == false) {
            flipFX.play();
            if (active < 1) {
                this.style.opacity = 100;
                active += 1;
                first = this;
            }
            else {
                second = this;
                this.style.opacity = 100;
                if (this.src == first.src) {
                    pairFX.play();
                    setTimeout(function() {
                        pairFX.load();
                    }, 500);
                    points += 10;
                    document.getElementById("score").innerHTML = "Score: " + points;
                    for (let card of cards) {
                        if (card.src == this.src) {
                            card.removeEventListener("click", opac);
                        }
                    }
    
                    for (let card of cards) {
                        if (card.style.opacity == 100) {
                            won += 1;
                        }
                        else {
                            won = 0;
                            break;
                        }
                    }
    
                    // You win banner for round 1
                    // Call round2 function to setup round 2
                    if (round == 'Round 1') {
                        if (won == 6) {
                            roundFX.play();
                            won = 0;
                            round = 'Round 2';
                            document.getElementById("win").innerHTML = "<h1>You beat round 1! Congratulations " + name + "!</h1>";
                            document.getElementById("win").innerHTML += "<h2>Your current score is: " + points + " points</h2>";
                            document.getElementById("win").innerHTML += "<h1 id='new'>Play Round 2</h1>";
                            document.getElementById("new").addEventListener("click", nextRound);
                        }
                    }
    
                    // You win banner for round 2
                    // Call round3 function to setup round 3
                    else if (round == 'Round 2') {
                        if (won == 12) {
                            roundFX.play();
                            won = 0;
                            round = 'Round 3';
                            document.getElementById("win").innerHTML = "<h1>You beat round 2! Congratulations " + name + "!</h1>";
                            document.getElementById("win").innerHTML += "<h2>Your current score is: " + points + " points</h2>";
                            document.getElementById("win").innerHTML += "<h1 style='text-decoration: underline;' id='new'>Round 3</h1>";
                            document.getElementById("win").style.textAlign = 'center';
                            document.getElementById("win").style.backgroundColor = "red";
                            document.getElementById("new").addEventListener("click", nextRound);
                        }
                    }
    
                    // You win banner for round 3
                    // Prompt user if they want to restart
                    else if (round == 'Round 3') {
                        if (won == 24) {
                            roundFX.play();
                            document.getElementById("win").innerHTML = "<h1>You beat the game! Congratulations " + name + "!</h1>";
                            document.getElementById("win").innerHTML += "<h2>Your final score is: " + points + " points</h2>";
                            document.getElementById("win").innerHTML += "<h2><a href='game.html'>Restart?</a></h2>";
                            document.getElementById("win").style.textAlign = 'center';
                            document.getElementById("win").style.backgroundColor = "red";
                        }
                    }
                }
                
                
                // Remove 5 points only if current score if 5+
                // This is to avoid negative score
                else {
                    cooldown = true;
                    setTimeout(function() {
                        first.style.opacity = 0;
                        second.style.opacity = 0;
                        cooldown = false;
                    }, 800);
    
                    if (points >= 5) {
                        points -= 5;
                    }
                    document.getElementById("score").innerHTML = "Score: " + points;
                }
                active = 0;
            }
        }
    }

    /*
    * Reset the image cards for the second round
    * Add one more card to each row and add a third row of cards
    * Change the images that are on the original cards
    * Add click event listeners again to each card and set opacities to 0
    */
    function round2() {
        document.getElementById("diff").innerHTML = "Round 2";
        document.getElementById("win").innerHTML = "";
        document.getElementById("row1").innerHTML += "<div class='tile'><img src='Images/snowflake.png' class='card' id='4'></div>";
        document.getElementById("row2").innerHTML += "<div class='tile'><img src='Images/snowflake.png' class='card' id='10'></div>";
        document.getElementById("row3").innerHTML += "<div class='tile'><img src='Images/snowflake.png' class='card' id='13'></div>" +
        "<div class='tile'><img src='Images/snowflake.png' class='card' id='14'></div>" +
        "<div class='tile'><img src='Images/snowflake.png' class='card' id='15'></div>" +
        "<div class='tile'><img src='Images/snowflake.png' class='card' id='16'></div>";
        document.getElementById("2").src = "Images/computer.png";
        document.getElementById("3").src = "Images/car.png";
        document.getElementById("4").src = "Images/dog.png";
        document.getElementById("7").src = "Images/egg.png";
        document.getElementById("9").src = "Images/icecream.png";
        document.getElementById("10").src = "Images/icecream.png";
        document.getElementById("13").src = "Images/computer.png";
        document.getElementById("14").src = "Images/dog.png";
        document.getElementById("15").src = "Images/egg.png";
        document.getElementById("16").src = "Images/snowflake.png";

        tiles = document.getElementsByClassName("tile");
        for (let tile of tiles) {
            tile.style.backgroundColor = colorCard;
        }

        cards = document.querySelectorAll(".card");
        for (let card of cards) {
            card.addEventListener("click", opac);
            card.style.opacity = 0;
        }
    }

    /*
    * Reset the image cards for the third round
    * Add two more cards to rows 1,2 and 3  and add a fourth row of cards
    * Change the images that are on the original cards
    * Add click event listeners again to each card and set opacities to 0
    */
    function round3() {
        document.getElementById("diff").innerHTML = "Round 3";
        document.getElementById("win").innerHTML = "";
        document.getElementById("row1").innerHTML += "<div class='tile'><img src='Images/dog.png' class='card' id='5'></div>" + 
        "<div class='tile'><img src='Images/hat.png' class='card' id='6'></div>";
        document.getElementById("row2").innerHTML += "<div class='tile'><img src='Images/leaf.png' class='card' id='11'></div>" +
        "<div class='tile'><img src='Images/soccerball.png' class='card' id='12'></div>";
        document.getElementById("row3").innerHTML += "<div class='tile'><img src='Images/egg.png' class='card' id='17'></div>" +
        "<div class='tile'><img src='Images/computer.png' class='card' id='18'></div>";
        document.getElementById("row4").innerHTML += "<div class='tile'><img src='Images/hat.png' class='card' id='19'></div>" +
        "<div class='tile'><img src='Images/snowflake.png' class='card' id='20'></div>" +
        "<div class='tile'><img src='Images/guitar.png' class='card' id='21'></div>" +
        "<div class='tile'><img src='Images/computer.png' class='card' id='22'></div>" +
        "<div class='tile'><img src='Images/apple.png' class='card' id='23'></div>" +
        "<div class='tile'><img src='Images/icecream.png' class='card' id='24'></div>";
        document.getElementById("1").src = "Images/leaf.png";
        document.getElementById("2").src = "Images/icecream.png";
        document.getElementById("3").src = "Images/bird.png";
        document.getElementById("4").src = "Images/egg.png";
        document.getElementById("7").src = "Images/apple.png";
        document.getElementById("8").src = "Images/snowflake.png";
        document.getElementById("9").src = "Images/guitar.png";
        document.getElementById("10").src = "Images/car.png";
        document.getElementById("13").src = "Images/car.png";
        document.getElementById("15").src = "Images/soccerball.png";
        document.getElementById("20").src = "Images/bird.png";
        cards = document.querySelectorAll(".card");

        tiles = document.getElementsByClassName("tile");
        for (let tile of tiles) {
            tile.style.backgroundColor = colorCard;
        }

        for (let card of cards) {
            card.addEventListener("click", opac);
            card.style.opacity = 0;
        }
    }

    /*
    * Display instructions if the user needs help
    * Click the 'Instructions' heading once to show and again to hide
    * Re-place listeners to account for innerHTML modifications
    */
    function help(event) {
        if (helpOn == false){
            document.getElementById("ins").innerHTML += "<p>Click a box to reveal its image</p>" +
            "<p>You can reveal at most 2 boxes at once</p>" + "<p>Match all pairs of images to move up the rounds</p>" +
            "<p>Gain 10 points for a correct match, lose 5 for an incorrect match</p>";
            helpOn = true;
            document.getElementById("help").addEventListener("click", help);
        }
        else {
            document.getElementById("ins").innerHTML = "<h2 style='text-decoration: underline;' id='help'>Instructions</h2>"
            helpOn = false;
            document.getElementById("help").addEventListener("click", help);
        }
    }
    document.getElementById("help").addEventListener("click", help);

    function nextRound(event) {
        if (round == 'Round 2') {
            round2();
        }
        else {
            round3();
        }
    }
});