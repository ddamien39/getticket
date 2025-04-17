var msginput = document.getElementById("msginput")
var ticketid = document.getElementById("ticketid")
var messages = document.getElementById("messages")

function sendmsg(ele) {
    if(event.key === 'Enter') {
        var inputValue = msginput.value
        var ticketId = ticketid.innerHTML
        
        fetch("/api/send_msg.php?ticketid=" + ticketId + "&msg=" + inputValue)
        .then(() => {
            var newMsgElement = document.createElement("p")
            newMsgElement.classList.add("self-message")
            newMsgElement.innerHTML = inputValue
            messages.append(newMsgElement)
            
            msginput.value = "";

            console.log("msg sent")
        })
    }
}