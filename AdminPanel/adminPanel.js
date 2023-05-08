
function loadSearchUserForm() {
  var CompanyListDiv = document.querySelector('.contentList');
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        CompanyListDiv.innerHTML = xhr.responseText;
      } else {
        alert('There was a problem loading the form.');
      }
    }
  };
  xhr.open('GET', './controls/searchUser.php', true);
  xhr.send();
}


function loadSearchCompanyForm() {
  var CompanyListDiv = document.querySelector('.contentList');
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        CompanyListDiv.innerHTML = xhr.responseText;
      } else {
        alert('There was a problem loading the form.');
      }
    }
  };
  xhr.open('GET', './controls/searchCompany.php', true);
  xhr.send();
}




function loadCompanyForm() {
  var usersListDiv = document.querySelector('.contentList');
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        usersListDiv.innerHTML = xhr.responseText;
      } else {
        alert('There was a problem loading the form.');
      }
    }
  };
  xhr.open('GET', './controls/addCompany.php', true);
  xhr.send();
}



function loadUserForm() {
  var usersListDiv = document.querySelector('.contentList');
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        usersListDiv.innerHTML = xhr.responseText;
      } else {
        alert('There was a problem loading the form.');
      }
    }
  };
  xhr.open('GET', './controls/addUser.php', true);
  xhr.send();
}



/**
 * The function will display a confirm message to the user- 
 * if clicks OK it will send the id to the deleteUser.php to delete the user.
 * 
 * @param {int} user_id -User id which will be deleted
 */
function DeleteUser(user_id) {
  if (confirm("Are you sure you want to delete this user?")) {
      // When user click OK, it wil send the id to delete it
      window.location.href = "./controls/deleteUser.php?user_id=" + user_id; 
  }
}

/**
 * The function will display a confirm message to the user- 
 * if clicks OK it will send the id to the deleteCompany.php to delete the company.
 * 
 * @param {int} company_id -User id which will be deleted
 */
function DeleteCompany(company_id) {
  if (confirm("Are you sure you want to delete this company?")) {
      // When user click OK, it wil send the id to delete it
      window.location.href = "./controls/deleteCompany.php?company_id=" + company_id;
  }
}
