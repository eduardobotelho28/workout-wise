const form = document.querySelector('#form-register')

if(form) form.addEventListener('submit', form_submit)

async function form_submit (evt) {

    evt.preventDefault()

    const formData = new FormData (form)

    // ------------------------ //

    try {

        for (const pair of formData.entries()) {
            console.log(pair[0], pair[1]);
          }
        
        //req to back-end 
        const res = await fetch('/workout-wise/authentication/register', {
            method : 'POST',
            body   : formData
        })

        if(!res.ok) throw new Error("req error");
            
        const json_response = await res.json()
        if(json_response.message) treat_response_message (json_response.message)

        console.log(json_response)
        

    } catch (error) {
        console.log(error)
    }

}