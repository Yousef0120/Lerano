document.addEventListener('DOMContentLoaded', () => {
    const container = document.querySelector('.container');
    const signupButton = document.querySelector('.signup-section header');
    const loginButton = document.querySelector('.login-section header');

    loginButton.addEventListener('click', () => {
        container.classList.add('active');
    });

    signupButton.addEventListener('click', () => {
        container.classList.remove('active');
    });

    const signupForm = document.getElementById('signupForm');
    signupForm.addEventListener('submit', function(event) {
        if (!validateForm()) {
            event.preventDefault();  
        }
    });


    function validateForm() {
        var fullname = document.getElementById("fullname").value.trim();
        var email = document.getElementById("email").value.trim();
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;

        if (fullname === "" || email === "" || password === "" || confirmPassword === "") {
            alert("All fields are required");
            return false;
        }

        if (!isValidFullname(fullname)) {
            alert("Full name should contain only letters and spaces with minimum length 3 char");
            return false;
        }

        if (!isValidPassword(password)) {
            alert("Password should contain at least one uppercase letter , lowercase letter and one digit with minimum length 8 char ");
            return false;
        }

        if (password !== confirmPassword) {
            alert("Passwords do not match");
            return false;
        }

        if (!isValidEmail(email)) {
            alert("email should be in the format mmmm@mmm.mmm");
            return false;
        }

        return true;
    }

    function isValidFullname(fullname) {
        var fullnameRegex = /^[a-zA-Z\s]{3,20}$/;
        return fullnameRegex.test(fullname);
    }

    function isValidPassword(password) {
    var uppercaseRegex = /[A-Z]/;    
    var lowercaseRegex = /[a-z]/;    
    var numberRegex = /\d/;          
    var minLength = 8;               

    return password.length >= minLength &&
    uppercaseRegex.test(password) &&
    lowercaseRegex.test(password) &&
    numberRegex.test(password);
}


    function isValidEmail(email) {
        var emailRegex = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z]{2,}$/;
        return emailRegex.test(email);
    }
});