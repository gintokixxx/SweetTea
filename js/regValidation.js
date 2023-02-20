const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const password = document.getElementById('password');
const cpassword = document.getElementById('cpassword');

form.addEventListener('submit', (event) =>{
  if(validateInputs()!=4){
    event.preventDefault();
  }
});



const isValidEmail = email => {
  const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(String(email).toLowerCase());
}

//CHECK IF IT HAS SPECIAL CHARACTERS
function containsSpecialCharacters(str){
  var format = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]+/;

  if(format.test(str)){
    return true;
  } else {
    return false;
  }
}

//FOR VALIDATING INPUTS 

function validateInputs(){
  let i = 0;
  const usernameValue =   username.value;
  const emailValue =   email.value;
  const passwordValue =   password.value;
  const cpasswordValue =   cpassword.value;

  if(usernameValue === ''){
    setError(username, 'Username is Required');
  } else if(usernameValue.length < 5) {
    setError(username, 'Minimum of 5 Characters');
  } else if(usernameValue.includes(' ') == true){
    setError(username, 'Inputs must not contain a space');
  } else if(containsSpecialCharacters(usernameValue) == true){
    setError(username, 'Username must not include special characters');
  } else {
    setSuccess(username);
    i++;
  }

  if(emailValue === ''){
    setError(email, 'Email is required');
  } else if(!isValidEmail(emailValue)) {
    setError(email, 'Provide a valid email address');
  } else if(usernameValue.includes(' ') == true){
    setError(username, 'Inputs must not contain a space');
  } else {
    setSuccess(email);
    i++;
  }

  if(passwordValue === ''){
    setError(password, 'Password is required');
  } else if(passwordValue.length < 8 ){
    setError(password, 'Password must be at least 8 character.');
  } else if(passwordValue.includes(' ') == true){
    setError(password, 'Inputs must not contain a space');
  } else {
    setSuccess(password);
    i++;
  }

  if(cpasswordValue === ''){
    setError(cpassword, 'Please confirm your password');
  } else if(cpasswordValue !== passwordValue){
    setError(cpassword, "Password doesn't match");
  } else if(cpasswordValue.includes(' ') == true){
    setError(cpassword, 'Inputs must not contain a space');
  } else {
    setSuccess(cpassword);
    i++;
  }
  
  return i;
}

function setError(input, errormsgs){
  const inputControl = input.parentElement;
  const errorDisplay = inputControl.querySelector('small');

  inputControl.className = "input-control error";
  errorDisplay.innerText = errormsgs;
}

function setSuccess(input){
  const inputControl = input.parentElement;
  inputControl.className = "input-control success";
}