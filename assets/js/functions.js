export function treat_response_message (data) {

    const msgDiv = document.querySelector('#msg-response')

    if(msgDiv) {

        msgDiv.innerHTML = ''

        if(data.errors && typeof data.errors == 'array') {
            data.errors.forEach(error => {
                const p     = document.createElement('p')
                p.innerText = error
                msgDiv.appendChild(p)
            });
            return
        }

        const p     = document.createElement('p')
        p.innerText = data.errors ?? ''
        msgDiv.appendChild(p)

        if(data.redirect_url) window.location.href = data.redirect_url
        
    }

}