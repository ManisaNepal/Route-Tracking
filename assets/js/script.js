/* Close Submenu From Anywhere */
// function closeSubmenu(e) {
//   if (menu.querySelector(".submenu-active")) {
//     let isClickInside = menu
//       .querySelector(".submenu-active")
//       .contains(e.target);

//     if (!isClickInside && menu.querySelector(".submenu-active")) {
//       menu.querySelector(".submenu-active").classList.remove("submenu-active");
//     }
//   }
// }

const menuIcon = document.querySelector(".toggle");
const mobileMenu = document.querySelector(".navMenu");

menuIcon.onclick = function () {
  if (mobileMenu.style.display != "block") {
    mobileMenu.style.display = "block";
    menuIcon.classList.replace("fa-bars", "fa-xmark");
  } else {
    mobileMenu.style.display = "none";
    menuIcon.classList.replace("fa-xmark", "fa-bars");
  }
};

// Defining a function to validate form
function printError(elemId, hintMsg) {
  document.getElementById(elemId).innerHTML = hintMsg;
}

function validateRegisFormStaff() {
  // Retrieving the values of form elements
  var fname = document.staffregis.fullname.value;
  var address = document.staffregis.address.value;
  var password = document.staffregis.password.value;
  var cpassword = document.staffregis.cpassword.value;
  var email = document.staffregis.email.value;
  var mobile = document.staffregis.mobile.value;
  // var terms = document.staffregis.terms.value;

  var terms = document.getElementById("agree");
  console.log("dob------- check");

  console.log("dob------- check");
  // Defining error variables with a default value
  var nameErr = (emailErr = mobileErr = addressErr = passwordErr = confirmPassErr = termsErr = true);

  console.log("check err ");
  // Validate name
  if (fname == "") {
    printError("nameErr", "Please enter fullname");
  } else {
    var regex = /^[a-zA-Z\s]+$/;
    if (regex.test(fname) === false) {
      printError("nameErr", "Please enter a valid name");
    } else {
      printError("nameErr", "");
      nameErr = false;
    }
  }
  console.log("check err 2");

  // Validate email address
  if (email == "") {
    printError("emailErr", "Please enter your email address");
  } else {
    // Regular expression for basic email validation
    var regex = /^\S+@\S+\.\S+$/;
    // var regex = /^[A-Z0-9_!#$%&'*+/=?`{|}~^-]+(?:\.[A-Z0-9_!#$%&'*+/=?`{|}~^-]+)*@[A-Z0-9-]+(?:\.[A-Z0-9-]+)*$/;
    if (regex.test(email) === false) {
      printError("emailErr", "Please enter a valid email address");
    } else {
      printError("emailErr", "");
      emailErr = false;
    }
  }

  // Validate mobile number
  if (mobile == "") {
    printError("mobileErr", "Please enter your mobile number");
  } else {
    // ^[9][6-8]{1}[0-9]{8}$  for nepali number
    var regex = /^[9][6-8]{1}[0-9]{8}$/;
    if (regex.test(mobile) === false) {
      printError("mobileErr", "Please enter a valid 10 digit mobile number");
    } else {
      printError("mobileErr", "");
      mobileErr = false;
    }
  }

  // Validate address
  if (address == "") {
    printError("addressErr", "Please enter your address");
  } else {
    // var regex = /[A-Za-z0-9'\.\-\s\,]/;
    var regex = /^[#.0-9a-zA-Z\s,-]+$/;
    if (regex.test(address) === false) {
      printError("addressErr", "Please enter a valid address");
    } else {
      printError("addressErr", "");
      addressErr = false;
    }
  }

  // Validate password
  if (password == "") {
    printError("passwordErr", "Please enter your Password");
  } else {
    // var regex = /[A-Za-z0-9'\.\-\s\,]/;
    // for password (?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$
    var regex = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
    if (regex.test(password) === false) {
      printError("passwordErr", "Please enter a Strong password");
    } else {
      printError("passwordErr", "");
      passwordErr = false;
    }
  }
  // Validate confirm password
  if (cpassword == "") {
    printError("confirmPassErr", "Please enter your Password");
  } else {
    if (password != cpassword) {
      printError("confirmPassErr", "Confirm password not match");
      console.log("confirmPassErr 1");
      console.log(confirmPassErr);
    } else {
      printError("confirmPassErr", "");
      console.log("confirmPassErr 2");
      console.log(confirmPassErr);
      confirmPassErr = false;
      console.log("confirmPassErr 3");
      console.log(confirmPassErr);
    }
  }

  // Validate terms and conditions
  if (!terms.checked) {
    printError("termsErr", "Please check term conditions");
  } else {
    printError("termsErr", "");
    termsErr = false;
  }

  // Prevent the form from being submitted if there are any errors
  if (
    (nameErr ||
      emailErr ||
      mobileErr ||
      addressErr ||
      passwordErr ||
      confirmPassErr ||
      termsErr) == true
  ) {
    console.log("validation failed");
    console.log(nameErr);
    console.log(emailErr);
    console.log(mobileErr);
    console.log(addressErr);
    // console.log(cityErr);
    // console.log(stateErr);
    console.log(confirmPassErr);
    console.log(passwordErr);
    // console.log(fileErr);
    console.log(termsErr);
    // console.log(genderErr);
    // console.log(customerUpload);
    console.log(terms.checked);
    console.log(mobile);
    return false;
  } else {
    // Display input data in a dialog box before submitting the form

    // alert(dataPreview);
    // console.log(dataPreview);
    console.log("validation success");
    // document.getElementById("customer_register").submit();

    return true;
  }
}

function validateLoginFormStaff() {
  // Retrieving the values of form elements
  var email = document.stafflogin.email.value;
  var password = document.stafflogin.password.value;
  // var terms = document.staffregis.terms.value;

  var rem = document.getElementById("agree");
  console.log("dob------- check");

  console.log("dob------- check");
  // Defining error variables with a default value
  var emailErr = (passwordErr = true);

  // Validate email address
  if (email == "") {
    printError("emailErr", "Please enter your email address");
  } else {
    // Regular expression for basic email validation
    var regex = /^\S+@\S+\.\S+$/;
    // var regex = /^[A-Z0-9_!#$%&'*+/=?`{|}~^-]+(?:\.[A-Z0-9_!#$%&'*+/=?`{|}~^-]+)*@[A-Z0-9-]+(?:\.[A-Z0-9-]+)*$/;
    if (regex.test(email) === false) {
      printError("emailErr", "Please enter a valid email address");
    } else {
      printError("emailErr", "");
      emailErr = false;
    }
  }

  // Validate password
  if (password == "") {
    printError("passwordErr", "Please enter your Password");
  } 
    else {
      printError("passwordErr", "");
      passwordErr = false;
    }
  //else {
    // var regex = /[A-Za-z0-9'\.\-\s\,]/;
    // for password (?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$
    /*var regex = /(?=^.{8,}$)(?=.*\d)(?=.*[!@#$%^&*]+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
    if (regex.test(password) === false) {
      printError("passwordErr", "Please enter a Strong password");
    } else {
      printError("passwordErr", "");
      passwordErr = false;
    }*/
  //}

  // Validate terms and conditions

  // Prevent the form from being submitted if there are any errors
  if ((emailErr || passwordErr) == true) {
    console.log("validation failed");
    // console.log(nameErr);
    // console.log(emailErr);
    // console.log(mobileErr);
    // console.log(addressErr);
    // console.log(cityErr);
    // console.log(stateErr);
    // console.log(confirmPassErr);
    // console.log(passwordErr);
    // console.log(fileErr);
    // console.log(termsErr);
    // console.log(genderErr);
    // console.log(customerUpload);
    // console.log(terms.checked);
    return false;
  } else {
    // Display input data in a dialog box before submitting the form

    // alert(dataPreview);
    // console.log(dataPreview);
    console.log("validation success");
    // document.getElementById("customer_register").submit();

    return true;
  }
}
