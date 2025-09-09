window.addEventListener("load", function(event) {
    document.getElementById("rabbit2").style.visibility = "hidden";
    document.getElementById("rabbit3").style.visibility = "hidden";
    document.getElementById("rabbit4").style.visibility = "hidden";
    document.getElementById("noeggs").style.visibility = "hidden";
    document.getElementById("slow").style.visibility = "hidden";

    let count = 0;

    function rabbit1(event) {
        document.getElementById("rabbit1").style.visibility = "hidden";
        document.getElementById("rabbit2").style.visibility = "visible";
        count += 1;
    }

    function rabbit2(event) {
        document.getElementById("rabbit2").style.visibility = "hidden";
        document.getElementById("rabbit3").style.visibility = "visible";
        count += 1;
    }
    
    function rabbit3(event) {
        document.getElementById("rabbit3").style.visibility = "hidden";
        document.getElementById("rabbit4").style.visibility = "visible";
        count += 1;
    }

    function rabbit4(event) {
        document.getElementById("rabbit4").style.visibility = "hidden";
        document.getElementById("rabbit1").style.visibility = "visible";
        document.getElementById("noeggs").style.visibility = "visible";
        count += 1;
        if (count >= 20) {
            document.getElementById("slow").style.visibility = "visible";
        }
    }

    document.getElementById("rabbit1").addEventListener("mouseover", rabbit1);
    document.getElementById("rabbit2").addEventListener("mouseover", rabbit2);
    document.getElementById("rabbit3").addEventListener("mouseover", rabbit3);
    document.getElementById("rabbit4").addEventListener("mouseover", rabbit4);
});