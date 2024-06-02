// function uploadImage() {
//     const image = document.getElementById('image');
//     const xhttp = new XMLHttpRequest();
//     xhttp.onreadystatechange = function () {
//         if (this.readyState == 4 && this.status == 200) {
//             console.log("Image Saved Successfully");
//             console.log(xhttp.responseText); 
//         } else {
//             console.error("Error:", xhttp.statusText);
//         }
//     }
//     xhttp.open("post", "uploads", true);
//     xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//     xhttp.send("image = image");

// }

function validateFullName() {
    var fullNameInput = document.forms["registrationForm"]["full-name"];
    var fullNameError = document.getElementById("fnameErr");
    var namePattern = /^[a-zA-Z ]*$/;

    if (fullNameInput.value === "") {
        fullNameError.textContent = "* Full name is required";
    } else if (!fullNameInput.value.match(namePattern)) {
        fullNameError.textContent = "* Only letters and white spaces are allowed";
    } else {
        fullNameError.textContent = "";
    }
}
function validateImageRequired() {
    //console.log("hello");
    const fileInput = document.forms["registrationForm"]["image"];
    const imageErr = document.getElementById('imageErr');

    if (fileInput.files.length === 0) {
        imageErr.textContent = 'Please select an image file.';
    } else {
        imageErr.textContent = '';
    }
}
function validateUserName() {
    var userNameInput = document.forms["registrationForm"]["user-name"];
    var userNameError = document.getElementById("unameErr");

    if (userNameInput.value === "") {
        userNameError.textContent = "* Username is required";
    } else {
        userNameError.textContent = "";
    }
}

function validateBirthday() {
    var birthdayInput = document.forms["registrationForm"]["birthday"];
    var birthdayError = document.getElementById("birthdayErr");

    if (birthdayInput.value === "") {
        birthdayError.textContent = "* Birthday is required";
    } else {
        birthdayError.textContent = "";
    }
}

function validateEmail() {
    var emailInput = document.forms["registrationForm"]["email"];
    var emailError = document.getElementById("emailErr");
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailInput.value === "") {
        emailError.textContent = "* Email is required";
    } else if (!emailInput.value.match(emailPattern)) {
        emailError.textContent = "* Incorrect email format";
    } else {
        emailError.textContent = "";
    }
}

function validatePhone() {
    var phoneInput = document.forms["registrationForm"]["phone"];
    var phoneError = document.getElementById("phoneErr");

    if (phoneInput.value === "") {
        phoneError.textContent = "* Phone is required";
    } else {
        phoneError.textContent = "";
    }
}

function validateAddress() {
    var addressInput = document.forms["registrationForm"]["address"];
    var addressError = document.getElementById("addressErr");

    if (addressInput.value === "") {
        addressError.textContent = "* Address is required";
    } else {
        addressError.textContent = "";
    }
}

function validatePassword() {
    var passwordInput = document.forms["registrationForm"]["password"];
    var passwordError = document.getElementById("passwordErr");
    var pattern = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;

    if (passwordInput.value === "") {
        passwordError.textContent = "* Password is required";
    } else if (!passwordInput.value.match(pattern)) {
        passwordError.textContent = "* Password must be at least 8 characters with at least 1 number and 1 special character";
    } else {
        passwordError.textContent = "";
    }
}

function validatePasswordConfirmation() {
    var passwordInput = document.forms["registrationForm"]["password"];
    var passwordConfirmationInput = document.forms["registrationForm"]["passwordconfirmation"];
    var passwordConfirmationError = document.getElementById("password2Err");

    if (passwordConfirmationInput.value === "") {
        passwordConfirmationError.textContent = "* Password confirmation is required";
    } else if (passwordConfirmationInput.value !== passwordInput.value) {
        passwordConfirmationError.textContent = "* Passwords do not match";
    } else {
        passwordConfirmationError.textContent = "";
    }
}

function validateForm() {
    validateFullName();
    validateUserName();
    validateBirthday();
    validateEmail();
    validatePhone();
    validateAddress();
    validatePassword();
    validatePasswordConfirmation();
    validateImageRequired();

    return (
        document.getElementById("fnameErr").textContent === "" &&
        document.getElementById("unameErr").textContent === "" &&
        document.getElementById("birthdayErr").textContent === "" &&
        document.getElementById("emailErr").textContent === "" &&
        document.getElementById("phoneErr").textContent === "" &&
        document.getElementById("addressErr").textContent === "" &&
        document.getElementById("passwordErr").textContent === "" &&
        document.getElementById("password2Err").textContent === "" &&
        document.getElementById("imageErr").textContent === ""
    );
}

function includeApiPage() {
    var xhttp = new XMLHttpRequest();
    var functionName = 'getAPI';

    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log("done");
            //eval(this.responseText + ';' + functionName + '();');
            var tempDiv = document.getElementById("apiContent");
            //.innerHTML = this.responseText;
            tempDiv.innerHTML = xhttp.responseText;

            // Get the desired function from the <div>
            var targetFunction = tempDiv.querySelector('script').innerText;

            // Execute the function
            window.eval(targetFunction + ';' + functionName + '();');
        }
    };
    xhttp.open("GET", "API.php", true);
    xhttp.send();
}

function getYear() {
    const birthInput = document.getElementsByName("birthday")[0].value;
    const birthdate = new Date(birthInput);
    const birthYear = birthdate.getFullYear();
    document.getElementById("year").innerHTML = birthYear;
}


