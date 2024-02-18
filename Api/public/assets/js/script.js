function validatesignupForm() {
    var username = document.getElementById('username').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var userType = document.querySelector('input[name="user-type"]:checked');
  
    // Reset errors
    document.getElementById('username-error').textContent = '';
    document.getElementById('email-error').textContent = '';
    document.getElementById('password-error').textContent = '';
  
    // Validate username
    if (username === '') {
      document.getElementById('username-error').textContent = 'Username is required.';
      return false;
    }
  
    // Validate email
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (email === '') {
      document.getElementById('email-error').textContent = 'Email is required.';
      return false;
    } else if (!emailPattern.test(email)) {
      document.getElementById('email-error').textContent = 'Invalid email format.';
      return false;
    }
  
    // Validate password
    // Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit
    var passwordPattern = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[a-zA-Z\d]{8,}$/;
    if (password === '') {
      document.getElementById('password-error').textContent = 'Password is required.';
      return false;
    } else if (!validatePassword(password)) {
      document.getElementById('password-error').textContent = 'Invalid password format. Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit.';
      return false;
    }

    // Proceed with sign-up
    console.log('Username:', username);
    console.log('Email:', email);
    console.log('User Type:', userType.value);
    console.log('Password:', password);
    return true;
  }
  

  // JavaScript for sign in form validation
  function validatesigninForm() {
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;
    var rememberMe = document.getElementById('remember-me').checked;
  
    // Reset error message
    document.getElementById('error-message').textContent = '';
  
    // Perform form validation
    if (email === '') {
      document.getElementById('error-message').textContent = 'Email is required.';
      return false;
    }
  
    if (password === '') {
      document.getElementById('error-message').textContent = 'Password is required.';
      return false;
    }
  
    // Proceed with sign-in logic
    console.log('Email:', email);
    console.log('Password:', password);
    console.log('Remember Me:', rememberMe);
  
    return true;
  }
  
  document.getElementById('forgot-password').addEventListener('click', function(event) {
    event.preventDefault();
    // Implement your forgot password logic here
    console.log('Forgot Password clicked');
  });
  