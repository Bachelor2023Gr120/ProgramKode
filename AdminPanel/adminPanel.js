
function loadSearchUserForm() {
  var usersListDiv = document.querySelector('.contentList');
  var userSearchForm = document.getElementById('userSearchForm');
  var companyList = document.getElementById('companyList');
  var searchUserButton = document.getElementsByName('Search_user')[0];
  var searchCompanyButton = document.getElementsByName('Search_Company')[0];

  userSearchForm.style.display = 'block';
  companyList.style.display = 'none';
  searchUserButton.classList.add('active');
  searchCompanyButton.classList.remove('active');

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
  xhr.open('GET', './controls/searchUser.php', true);
  xhr.send();
}



function loadSearchCompanyForm() {
  var usersListDiv = document.querySelector('.CompanyList');
  var userSearchForm = document.getElementById('userSearchForm');
  var companyList = document.getElementById('companyList');
  var searchUserButton = document.getElementsByName('Search_user')[0];
  var searchCompanyButton = document.getElementsByName('Search_Company')[0];

  companyList.style.display = 'block';
  userSearchForm.style.display = 'none';
  searchCompanyButton.classList.add('active');
  searchUserButton.classList.remove('active');

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
  xhr.open('GET', './controls/searchCompany.php', true);
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
  xhr.open('GET', '../AdminPanel/controls/addUser.php', true);
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



function DeleteUser(user_id) {
  if (confirm("Are you sure you want to delete this user?")) {
      // User clicked OK, proceed with delete operation
      window.location.href = "./controls/deleteUser.php?user_id=" + user_id; // Replace "id" with the name of the parameter that your PHP script expects to receive
  }
}
function DeleteCompany(company_id) {
  if (confirm("Are you sure you want to delete this company?")) {
      // User clicked OK, proceed with delete operation
      window.location.href = "./controls/deleteCompany.php?company_id=" + company_id; // Replace "id" with the name of the parameter that your PHP script expects to receive
  }
}



function UpdateUserData(user_id) {
  if (confirm("Are you sure you want to Update this users data?")) {
  var usersListDiv = document.querySelector('.contentList');
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        //window.location.href = "updateUserData.php?user_id=" + user_id; 
        usersListDiv.innerHTML = xhr.responseText;
      } else {
        alert('There was a problem loading the form.');
      }
    }
  };
  xhr.open('POST', './controls/updateUserData.php?user_id=' + user_id, true);
  xhr.send();
}
}

