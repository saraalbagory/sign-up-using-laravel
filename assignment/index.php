<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <style>
        br{
            margin-top:10px;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            font-family: Arial, sans-serif;
        }

        .container {
            margin: 20px 0px;
            width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            padding: 20 100px;
        }

        .container input[type="text"],
        .container input[type="password"],
        .container input[type="date"],
        .container input[type="tel"],
        .container input[type="file"] {
            width: 100%;
            padding: 5px;
            border-radius: 4px;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        .container span {
            color: red;
        }

        .container div {
            margin-top: 10px;
            text-align: center;
        }

        .container input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .container input[type="submit"]:hover {
            background-color: #45a049;
        }
        
    </style>
    <script>
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
            var passwordConfirmationInput = document.forms["registrationForm"]["password-confirmation"];
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

        return (
            document.getElementById("fnameErr").textContent === "" &&
            document.getElementById("unameErr").textContent === "" &&
            document.getElementById("birthdayErr").textContent === "" &&
            document.getElementById("emailErr").textContent === "" &&
            document.getElementById("phoneErr").textContent === "" &&
            document.getElementById("addressErr").textContent === "" &&
            document.getElementById("passwordErr").textContent === "" &&
            document.getElementById("password2Err").textContent === ""
        );
    }
    </script>
</head>
<body>
    <div class="container">
        <form name="registrationForm" onsubmit="return validateForm()" action= "DB_Ops.php" method="post" >
            Full Name: <input type="text" name="full-name" onkeyup="validateFullName()"><span id="fnameErr">*</span><br>
            User Name: <input type="text" name="user-name" onkeyup="validateUserName()"><span id="unameErr">*</span><br>
            Birthday: <input type="date" name="birthday" onkeyup="validateBirthday()"><span id="birthdayErr">*</span><br>
            E-mail: <input type="text" name="email" onkeyup="validateEmail()"><span id="emailErr">*</span><br>
            Phone: <input type="tel" name="phone" onkeyup="validatePhone()"><span id="phoneErr">*</span><br>
            Address: <input type="text" name="address" onkeyup="validateAddress()"><span id="addressErr">*</span><br>
            Password: <input type="password" name="password" onkeyup="validatePassword()"><span id="passwordErr">*</span><br>
            Confirm Password: <input type="password" name="password-confirmation" onkeyup="validatePasswordConfirmation()"><span id="password2Err">*</span><br>
            User Image: <input type="file" name="image" accept="image/*"><span id="imageErr">*</span><br>
            <div>
                <input type="submit">
            </div>
        </form>
    </div>
</body>
</html>