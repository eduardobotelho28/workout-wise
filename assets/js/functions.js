export function treat_response_message (data) {

    const msgDiv = document.querySelector('#msg-response')

    if(msgDiv) {

        msgDiv.innerHTML = ''

        if(data.errors) {
            data.errors.forEach(error => {
                const p     = document.createElement('p')
                p.innerText = error
                msgDiv.appendChild(p)
            });
            return
        }

        const p     = document.createElement('p')
        p.innerText = data.message ?? ''
        msgDiv.appendChild(p)
        
    }

}