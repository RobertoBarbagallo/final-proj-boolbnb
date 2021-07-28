
const viewMessage = document.getElementById("viewMessage");
const target = document.getElementById("target");
let clickMessages = false


viewMessage.addEventListener("click", function () {
    clickMessages = !clickMessages
    if (!clickMessages) {
        target.className = "hidden";
    }
    else { target.className = "show"; }

    console.log(clickMessages)
})


window.addEventListener("load", function () {
    const deleteForm = document.getElementById('delete_form');
    deleteForm.addEventListener('submit', (event) => {
        console.log(event)
        /* if (!confirm('ATTENZIONE! I dati andranno IRRIMEDIABILMENTE PERSI! Sei sicuro?')) {
            event.preventDefault();
        } */

    })
})
