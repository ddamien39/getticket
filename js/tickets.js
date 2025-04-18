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

function claimTicket(ticketid)
{
    fetch("/api/claim_ticket.php?ticketid=" + ticketid)
    .then(() => {
        window.location.reload()
    })
}

function unclaimTicket(ticketid)
{
    fetch("/api/unclaim_ticket.php?ticketid=" + ticketid)
    .then(() => {
        window.location.reload()
    })
}

function closeTicket(ticketid)
{
    fetch("/api/close_ticket.php?ticketid=" + ticketid)
    .then(() => {
        window.location.reload()
    })
}

function openTicket(ticketid)
{
    fetch("/api/reopen_ticket.php?ticketid=" + ticketid)
    .then(() => {
        window.location.reload()
    })
}

function deleteAllCookies() {
    document.cookie.split(';').forEach(cookie => {
        const eqPos = cookie.indexOf('=');
        const name = eqPos > -1 ? cookie.substring(0, eqPos) : cookie;
        document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
    });
}

function logout()
{
    deleteAllCookies()
    window.location.reload()
}