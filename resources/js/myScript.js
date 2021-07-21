const viewMessage = document.getElementById("viewMessage");
const target = document.getElementById("target");
let clickMessages = false


viewMessage.addEventListener("click" , function () {
    clickMessages = !clickMessages
    if(!clickMessages){
    target.className = "hidden";
    }
    else{target.className = "show";}

    console.log(clickMessages)
})

