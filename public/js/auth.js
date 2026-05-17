// registration form validation
function validateRegisterForm() {
    let name = document.getElementById('name').value;
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    let address = document.getElementById('address').value;
    let phone = document.getElementById('phone').value;
    
    if(name == "") {
        alert("Name is required!");
        return false;
    }
    
    if(email == "") {
        alert("Email is required!");
        return false;
    }
    
    if(password == "") {
        alert("Password is required!");
        return false;
    }
    
    if(password.length < 8) {
        alert("Password must be at least 8 characters!");
        return false;
    }
    
    if(address == "") {
        alert("Address is required!");
        return false;
    }
    
    if(phone == "") {
        alert("Phone is required!");
        return false;
    }
    
    return true;
}

// Login form validation
function validateLoginForm() {
    let email = document.getElementById('email').value;
    let password = document.getElementById('password').value;
    
    if(email == "") {
        alert("Email is required!");
        return false;
    }
    
    if(password == "") {
        alert("Password is required!");
        return false;
    }
    
    return true;
}

// Change password validation
function validateChangePasswordForm() {
    let currentPassword = document.getElementById('current_password').value;
    let newPassword = document.getElementById('new_password').value;
    let confirmPassword = document.getElementById('confirm_password').value;
    
    if(currentPassword == "") {
        alert("Current password is required!");
        return false;
    }
    
    if(newPassword == "") {
        alert("New password is required!");
        return false;
    }
    
    if(newPassword.length < 8) {
        alert("New password must be at least 8 characters!");
        return false;
    }
    
    if(newPassword != confirmPassword) {
        alert("New passwords do not match!");
        return false;
    }
    
    return true;
}

// Edit profile validation
function validateEditProfileForm() {
    let name = document.getElementById('name').value;
    let address = document.getElementById('address').value;
    let phone = document.getElementById('phone').value;
    
    if(name == "") {
        alert("Name is required!");
        return false;
    }
    
    if(address == "") {
        alert("Address is required!");
        return false;
    }
    
    if(phone == "") {
        alert("Phone is required!");
        return false;
    }
    
    return true;
}