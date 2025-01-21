const all_delete_buttons = document.querySelectorAll('.delete')

if (all_delete_buttons) {
    all_delete_buttons.forEach(button => {
        button.addEventListener('click', send_to_delete)
    })
}

async function send_to_delete (evt) {
    
    const id  = evt.target.id

    const req = await fetch (`/workout-wise/exercises/delete/${id}`)
    const res = await req.json()

    console.log(res)

    if(res.status === 'success') location.reload(true)
    
}