const form = document.getElementById('form');
const username = document.getElementById('username');
const cpassword = document.getElementById('password');

form.addEventListener('submit', (event) =>{
  if(validateInputs()!=2){
    event.preventDefault();
  }
});


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

  if(cpasswordValue === ''){
    setError(cpassword, 'Password is Required');
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