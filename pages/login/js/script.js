const btnLogin = document.querySelector(".btn-login")
const form = document.querySelector("form")

btnLogin.addEventListener("click", (event) => {
    event.preventDefault()
    const fields = [...document.querySelectorAll(".input-block input")]
    fields.forEach(field => {
        if(field.value == ""){
            form.classList.add("validate-error")
        }else{
            window.location.replace("../../index.html")
        }
    })

    const formError = document.querySelector(".validate-error")
    if(formError){
        formError.addEventListener("animationend", (event) => {
            if(event.animationName === "nono"){
                formError.classList.remove("validate-error")
            }
        })
    }

})

