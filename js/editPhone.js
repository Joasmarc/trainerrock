btnUpdatePhone.addEventListener("click",()=>{

  let phoneNum = document.getElementById("phoneNum")
  phoneNum.innerHTML
  phoneNum.hidden = true

  newPhone.hidden = false
  newPhone.value = phoneNum.innerHTML
  btnSubmitPhone.hidden = false

  btnUpdatePhone.hidden = true
})


