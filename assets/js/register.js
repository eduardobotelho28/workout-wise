import { treat_response_message } from "/workout-wise/assets/js/functions.js";

const form = document.querySelector('#form-register')

if(form) form.addEventListener('submit', form_submit)

async function form_submit (evt) {

    evt.preventDefault()

    const formData = new FormData (form)

    // ------------------------ //

    try {

        //req to back-end 
        const res = await fetch('/workout-wise/authentication/register', {
            method : 'POST',
            body   : formData
        })

        if(!res.ok) throw new Error("req error");
            
        const json_response = await res.json()
        if(json_response) treat_response_message (json_response)

    } catch (error) {
        console.log(error)
    }

}