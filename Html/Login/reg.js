function setbutton(state){
    // if state = true -> remove atb 'disabled'
    // if state = false -> set atb 'disabled' = true
    if(state){
        document.getElementById("submit").removeAttribute('disabled')
    }
    else{
        document.getElementById("submit").setAttribute('disabled','true');
    }
}

function namevalid(text){
    let vtext = document.getElementById(text).value;
    let valid;
    if (text==="nename"){
        valid = document.getElementById("nename-validation");
    }
    else if (text=="rename"){
        valid = document.getElementById("rename-validation");
    }
    valid.style.color = "red";
    let temp = vtext.trim().split(" ");
    let notAlph = 0;
    var len = temp.length;
    if (len==2||len==3){
        for (let i in temp){
            if(temp[i].match(/[^a-z|^ก-๛]/i)!=null){notAlph+=1}
        }
        let noNum = (notAlph == 0);
        
        if(noNum){
            valid.innerHTML = "";
        }else{
            valid.innerHTML = "Only letter are allows";
        }
        setbutton(noNum);
    }else{
        valid.innerHTML = "Please enter full name";
        setbutton(false);
    }
}
function emailvalid(text){
    let etext = document.getElementById(text).value;
    let valid;
    if (text==="neemail"){
        valid = document.getElementById("neemail-validation");
    }
    else if (text=="reemail"){
        valid = document.getElementById("reemail-validation");
    }
    const pattern = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(etext);//email pattern
    if (etext!=''){
        if (!pattern){
            valid.innerHTML = "Email invalid.";
            valid.style.color = "red";
        }
        else{
            // valid.innerHTML = "Email valid.";
            valid.innerHTML = "";
            valid.style.color = "green";
        }
        setbutton(pattern);
    }
}

function idvalid(text){
    let vtext = document.getElementById(text).value;
    let IDtype;
    let len = vtext.length;
    let res;

    let valid;
    if(text==="neID"){
        valid = document.getElementById("neID-validation");
    }
    else if(text==="reID"){
        valid = document.getElementById("reID-validation");
    }

    if(len==7||len==9){
        IDtype="passport";
        let pattern7 = /^[A-Z][0-9]{6}$/i;
        let pattern9 = /^[A-Z][A-Z][0-9]{7}$/i;
        let notmatch;
        if(len==7){
            notmatch = text.match(pattern7);
        }
        else
        {
            notmatch = text.match(pattern9);
        }

        if(notmatch===null){
            // res = "Passport valid";
            res = "";
            valid.style.color = "green";
        }
        else{
            res = "Passport invalid";
            setbutton(false);
            valid.style.color = "red";
        }
    }
    else if (len==13){
        IDtype="ID";
        let notNum = /[^0-9]/;
        if(vtext.match(notNum)==null){
            // res = "ID correct";
            res = "";
            valid.style.color = "green";
        }
        else{
            res = "ID not correct"
            valid.style.color = "red";
        } 
    }
    else{
        IDtype="ID not valid";
        setbutton(false);
        res = "Please enter ID or Passport";
        valid.style.color = "red";
    }
    valid.innerHTML = res;
}