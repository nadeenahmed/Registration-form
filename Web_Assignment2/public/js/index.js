// JS form Validation
var form = document.getElementById("form");
form.addEventListener("submit", (e) => {
    var isValid = true;

    //full name validation
    var name = document.getElementById("fullName").value;
    if (name === "") {
        document.getElementById("nameerror").innerHTML = validationMessages["*Name is Required"];
        document.getElementById("fullName").focus();
        isValid = false;
    } else if (isNaN(name) === false) {
        document.getElementById("nameerror").innerHTML =validationMessages["*Name Can not be a number"];
        document.getElementById("fullName").focus();
        isValid = false;
    } else {
        document.getElementById("nameerror").innerHTML = "";
        isValid = isValid ? true : false;
    }
    //user name validation
    var username = document.getElementById("username").value;
    if (username === "") {
        document.getElementById("unameerror").innerHTML =
            validationMessages["*UserName is Required"];
        document.getElementById("username").focus();
        isValid = false;
    } else {
        fetch(`/check-username/${username}`)
                .then(response => response.json())
                .then(data => {
                    if (data.exists) {
                        // display an error message if the username already exists
                        document.getElementById("unameerror").innerHTML =validationMessages["*UserName is already taken"];
                        isValid = false;
                    } else {
                        // clear the error message if the username doesn't exist
                        document.getElementById("unameerror").innerHTML ="";
                    }
                })
        .catch(error => console.error(error));    
        isValid = isValid ? true : false;
    }

    //birth date validation
    var BD = document.getElementById("birthDate").value;
    if (BD === "") {
        document.getElementById("dateerror").innerHTML =validationMessages["*Birth date is Required"];
        document.getElementById("birthDate").focus();
        isValid = false;
    } else {
        document.getElementById("dateerror").innerHTML = "";
        isValid = isValid ? true : false;
    }

    //mobile number validation
    var phone = document.getElementById("phone").value;

    let x = phone.indexOf("011");
    let y = phone.indexOf("010");
    let z = phone.indexOf("012");
    let w = phone.indexOf("015");
    if (phone === "") {
        document.getElementById("phoneerror").innerHTML =validationMessages["*Phone Number is Required"];
        document.getElementById("phone"), focus();
        isValid = false;
    } else if (phone.length < 11) {
        document.getElementById("phoneerror").innerHTML =validationMessages["*Invalid Phone Number (less than 11 number)"];
        document.getElementById("phone"), focus();
        isValid = false;
    } else if (x != 0 && y != 0 && z != 0 && w != 0) {
        document.getElementById("phoneerror").innerHTML =validationMessages["*Invalid Phone Number"];
        document.getElementById("phone"), focus();
        isValid = false;
    } else {
        document.getElementById("phoneerror").innerHTML = "";
        isValid = isValid ? true : false;
    }

    //Address validation
    var address = document.getElementById("address").value;

    if (address === "") {
        document.getElementById("adderror").innerHTML = validationMessages["*Address is Required"];
        document.getElementById("address").focus();
        isValid = false;
    } else {
        document.getElementById("adderror").innerHTML = "";
        isValid = isValid ? true : false;
    }
    // password validation
    var password = document.getElementById("password").value;
    var pattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[a-zA-Z]).{8,}$/;

    if (password === "") {
        document.getElementById("passerror").innerHTML =validationMessages["*Password is Required"];
        document.getElementById("password").focus();
        isValid = false;
    } else if (!pattern.test(password)) {
        document.getElementById("passerror").innerHTML =
            validationMessages["*Password must be at least 8 characters with at least 1 number and 1 special character"];
        document.getElementById("password").focus();
        isValid = false;
    } else {
        document.getElementById("passerror").innerHTML = "";
        isValid = isValid ? true : false;
    }
    // confirm password validation
    var cpassword = document.getElementById("confirmPassword").value;

    if (cpassword === "") {
        document.getElementById("cpasserror").innerHTML =validationMessages["*Confirm Password is Required"];
        document.getElementById("confirmPassword").focus();
        isValid = false;
    } else if (cpassword !== password) {
        document.getElementById("cpasserror").innerHTML =validationMessages["*Incorrect password"];
        document.getElementById("confirmPassword").focus();
        isValid = false;
    } else {
        document.getElementById("cpasserror").innerHTML = "";
        isValid = isValid ? true : false;
    }

    // img validation
    var img = document.getElementById("image").value;
    if (img === "") {
        document.getElementById("imgerror").innerHTML = validationMessages["*Image is Required"];
        document.getElementById("image").focus();
        isValid = false;
    } else {
        document.getElementById("imgerror").innerHTML = "";
        isValid = isValid ? true : false;
    }
    //email validation
    var email = document.getElementById("email").value;

    let at = email.indexOf("@");
    let dot = email.indexOf(".");

    if (email === "") {
        document.getElementById("emailerror").innerHTML = validationMessages["*Email is Required"];
        document.getElementById("email").focus();
        isValid = false;
    } else if (at == -1 || dot == -1) {
        document.getElementById("emailerror").innerHTML = validationMessages["*Invalid Email"];
        document.getElementById("email").focus();
        isValid = false;
    } else {
        document.getElementById("emailerror").innerHTML = "";
        isValid = isValid ? true : false;
    }

    //if all info is not validated
    if (isValid == false) {
        e.preventDefault();
    } 
});

// function to clear all erros onclick reset button
function clearerrors() {
    var array = [
        "nameerror",
        "unameerror",
        "dateerror",
        "phoneerror",
        "adderror",
        "passerror",
        "cpasserror",
        "imgerror",
        "emailerror",
        "container",
    ];
    for (let i = 0; i < array.length; i++) {
        document.getElementById(array[i]).innerHTML = "";
    }
}
// function to show password
const togglePassword = document.querySelector("#togglePassword");
const password = document.querySelector("#password");

togglePassword.addEventListener("click", function (e) {
    // toggle the type attribute
    const type =
        password.getAttribute("type") === "password" ? "text" : "password";
    password.setAttribute("type", type);
    // toggle the eye slash icon
    this.classList.toggle("fa-eye-slash");
});
