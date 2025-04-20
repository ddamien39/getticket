var msginput = document.getElementById("msginput")
var ticketid = document.getElementById("ticketid")
var userid = document.getElementById("currentuserid")
var messages = document.getElementById("messages")

var ticketstatus = document.getElementsByClassName("ticketstatus")[0].children[0]
var ticketclaimer = document.getElementsByClassName("ticketclaimer")[0].children[0]
var ticket_state_set_btn = document.getElementsByClassName("statebtn")[0]


function sendmsg(ele) {
    if(event.key === 'Enter') {
        var inputValue = msginput.value
        var ticketId = ticketid.innerHTML
        
        fetch("/api/send_msg.php?ticketid=" + ticketId + "&msg=" + inputValue)
        .then(() => {
            var newMsgElement = document.createElement("p")
            let msgCount = document.getElementsByClassName("self-message").length + document.getElementsByClassName("other-message").length + document.getElementsByClassName("system-message").length

            newMsgElement.classList.add("self-message")
            newMsgElement.innerHTML = inputValue
            messages.append(newMsgElement)
            
            msginput.value = "";

            if (msgCount >= 11)
            {
                messages.children[1].remove()
            }
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

function getLastSavedMessage()
{
    return messages.children[messages.children.length-1].innerHTML
}


function getMsgCount()
{
    let msgCount = document.getElementsByClassName("self-message").length + document.getElementsByClassName("other-message").length + document.getElementsByClassName("system-message").length
    return msgCount;
}

setInterval(() => {
    let lastMessage = null;
    apiMessages = fetch("/api/get_messages.php?ticketid=" + ticketid.innerHTML)
    .then(res => {
        res.json().then(jsonel => {
            jsonel.forEach(msg => {
                if (msg["is_read"] == 0 && msg["user_id"] != userid.innerHTML)
                {
                    var newMsgElement = document.createElement("p")

                    newMsgElement.classList.add(msg["system_msg"] ? "system-message" : "other-message")
                    newMsgElement.innerHTML = msg["message"]
                    messages.append(newMsgElement)

                    if(msg["message"].includes("Ticket re-opened by"))
                    {
                        msginput.placeholder = "";
                        msginput.classList.remove("disabled-msg-input")
                        msginput.disabled = false

                        ticketstatus.innerHTML = "open"
                        ticket_state_set_btn.classList = "statebtn mt-3 focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"
                        ticket_state_set_btn.innerHTML = "Close Ticket"
                        ticket_state_set_btn.onclick = () => {closeTicket(ticketid.innerHTML)}
                    }
                    if(msg["message"].includes("Ticket closed by"))
                    {
                        msginput.placeholder = "This ticket is closed. You may not reply to this ticket anymore.";
                        msginput.classList.add("disabled-msg-input")
                        msginput.disabled = true
                        msginput.value = "";

                        ticket_state_set_btn.classList = "statebtn mt-3 focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5"
                        ticket_state_set_btn.innerHTML = "Open Ticket"
                        ticket_state_set_btn.onclick = () => {openTicket(ticketid.innerHTML)}

                        ticketstatus.innerHTML = "closed"
                    }

                    if(msg["message"].includes("Your ticket was claimed by"))
                    {
                        ticketclaimer.innerHTML = msg["message"].split("Your ticket was claimed by ")[1]
                    }
    

                    while(getMsgCount() >= 13)
                    {
                        messages.children[1].remove()
                    }
                }
            });
        })
    })

    
}, 5000);


fetch("/api/get_messages.php?ticketid=" + ticketid.innerHTML) // set all messages as read upon ticket opening