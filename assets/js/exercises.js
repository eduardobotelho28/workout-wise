const all_delete_buttons = document.querySelectorAll('.delete')
const form               = document.querySelector('#exercise-form')
const exercise_field     = document.querySelector('#exercise_field')

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

form.addEventListener('submit', send_to_save) 

async function send_to_save (evt) {

    evt.preventDefault()

    let exercise = exercise_field.value

    if(exercise != "") {

        const encodedExercise = encodeURIComponent(exercise);

        const req = await fetch (`/workout-wise/exercises/insert/${encodedExercise}`)
        const res = await req.json()

        console.log(res)

        if (res.status === 'success') location.reload()

    }


}