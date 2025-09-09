window.addEventListener("load", function() {
    let credits = 10;
    let roll = document.getElementById("roll");
    let bet = document.getElementById("bet");
    let limit = document.getElementById("limit");
    let url = "roll.php";

    roll.addEventListener("click", function() {
        if (credits > 0) {
            if (bet.value <= credits) {
                limit.innerHTML = "";
                let url = "roll.php";
            
                fetch(url, { credentials: 'include' })
                    .then(response => response.json())
                    .then(data => {
                        success(data);
                    })
                credits -= bet.value;
            }
            else {
                limit.innerHTML = "Bet too high, must be between 1 and your total credits";
            }
        }
        else {
            let url = "roll.php?end=1";
            limit.innerHTML = "Ran out of credits! Replay to try again";
            document.getElementById("again").style.visibility = 'visible';
            fetch(url)
                .then(response => response.text())
        }
    });
    
    function success(data) {
        for (i = 0; i < 3; i++) {
            if (data[i] == "apple") {
                document.getElementById("img" + i).src = "images/apple.png";
            }
            else if (data[i] == "grapes") {
                document.getElementById("img" + i).src = "images/grapes.png";
            }
            else {
                document.getElementById("img" + i).src = "images/watermelon.png";
            }
            
        }
        credits += parseInt(data[3]);
        document.getElementById("earnings").innerHTML = "<h2>Current credits: " + credits + "</h2>";
    }
});