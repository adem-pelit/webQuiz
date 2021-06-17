connectFile = "";
bilgi = null;
xhr = new XMLHttpRequest();
xhr.open('GET', "json.php");

xhr.onload = () => {
    connectFile = xhr.response;
    console.log(xhr.response);
    //document.body.innerHTML = connectFile;
    bilgi = JSON.parse(connectFile);
    console.log(bilgi);
    if (bilgi === "access denied!") {
        location.replace("login.php?error=accessDenied")
    }
    else add();
};

xhr.send();
myButton = null;
function add() {
    bilgi.forEach(element => {
        myDiv = document.createElement("div");
        myDiv.className = "msg";
        myDiv.id = element.id;

        myH1 = document.createElement("strong");
        myH1.innerHTML = element.userName;

        para = document.createElement("p");
        para.innerHTML = element.text;

        para2 = document.createElement("p");
        para2.id = element.id + "_likes";
        para2.innerHTML = element.likes + " beğenme";

        myButton = document.createElement("input");
        myButton.className = "btn";
        myButton.type = "button";
        myButton.value = "beğen!";

        myButton.onclick = () => {
            console.log("like.php?id=" + element.id);
            getLike = new XMLHttpRequest();
            getLike.open('GET', "like.php?id=" + element.id);

            getLike.onload = () => {
                connectFile = getLike.response;
                document.getElementById(element.id + "_likes").innerHTML = connectFile + " beğenme!";
                if (bilgi === "access denied!") {
                    location.replace("login.php?error=accessDenied");
                }
            };
            getLike.send();
        }

        myDiv.appendChild(myH1);
        myDiv.appendChild(para);
        myDiv.appendChild(para2);
        myDiv.appendChild(myButton);

        //document.body.appendChild(myDiv);
        idli = document.getElementById("postPanel");
        insertAfter(myDiv, idli);
    });
}

function insertAfter(newNode, referenceNode) {
    referenceNode.parentNode.insertBefore(newNode, referenceNode.nextSibling);
}