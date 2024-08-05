function checkpassword(){
    let pass =document.getElementById("ps").value;
    let cpass =document.getElementById("cps").value;

    

    let mess=document.getElementById("mess");
    if(pass.length !=0){
        if(pass ==cpass){
            mess.textContent="Correct password"
            action="Signin.php"

        }
        else{
            mess.textContent="Incorect password"
             mess.style.background='#ff4d4d'
        }
    }
}