function validateForm() {
  var username = document.forms["form"]["username"].value;
  var firstname = document.forms["form"]["fname"].value;
  var lastname = document.forms["form"]["lname"].value;
  var gender = document.forms["form"]["gender"].value;
  var blue = document.getElementById("Blue").checked;
  var red = document.getElementById("Red").checked;
  var green = document.getElementById("Green").checked;
  var pwd = document.forms["form"]["password"].value;
  var cpwd = document.forms["form"]["confirm_password"].value;
  //var email = document.forms["form"]["email"].value;
  var letters = /^[A-Za-z]+$/;
   if(username == '' || !username.match(letters))
     {
    alert("User Name must be filled out and cannot accept spaces and letters");
    document.form.username.focus();
    return false;
  }
  if (firstname == "") {
    alert("First Name must be filled out");
    document.form.fname.focus();
    return false;
  }
  if (lastname == "") {
    alert("Last Name must be filled out");
    document.form.lname.focus();
    return false;
  }
    if (gender == "") {
  alert("Please Select Gender");
//    document.form.gender.focus();
  return false;
  }
 if (
	blue == false &&
	red == false &&
	green == false) 
	{
		alert ('choose atleast one colour!');
		return false;
	} 
        if (pwd == '' || pwd != cpwd) {
    alert("Password and Confirm Password mismatch");
    document.form.password.focus();
    return false;
  }
  if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(form.email.value))
  {
    return (true)
  }
  else
  {
    alert("You have entered an invalid email address!");
    document.form.email.focus();
    return (false)
    }
}
