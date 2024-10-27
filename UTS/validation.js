function validateForm() {
    const username = document.getElementById("username").value;
    const password = document.getElementById("password").value;
    const errorMessage = document.getElementById("error-message");
    errorMessage.innerText = "";

    if (!username || !password) {
        errorMessage.innerText = "Must be filled";
        return false;
    }
    if (password.length > 6) {
        errorMessage.innerText = "Password is more than 6 characters";
        return false;
    }
    if (!/[a-z]/.test(password) || !/[A-Z]/.test(password)) {
        errorMessage.innerText = "Password must contain uppercase and lowercase.";
        return false;
    }

    sessionStorage.setItem("username", username);
    return true;
}
