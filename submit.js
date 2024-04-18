document.getElementById('bookingForm').addEventListener('submit', function (event) {
  event.preventDefault();
  var isValid = true;
  var email = document.getElementById('email').value.trim();
  if (!isValidEmail(email)) {
    isValid = false;
    document.getElementById('email').classList.add('is-invalid');
  } else {
    document.getElementById('email').classList.remove('is-invalid');
  }

  var hotelName = document.getElementById('hotelName').value.trim();
  if (!hotelName) {
    isValid = false;
    document.getElementById('hotelName').classList.add('is-invalid');
  } else {
    document.getElementById('hotelName').classList.remove('is-invalid');
  }

  var arrivalDate = document.getElementById('arrivalDate').value.trim();
  var arrivalTime = document.getElementById('arrivalTime').value.trim();
  if (!arrivalDate || !arrivalTime) {
    isValid = false;
    document.getElementById('arrivalDate').classList.add('is-invalid');
    document.getElementById('arrivalTime').classList.add('is-invalid');
  } else {
    document.getElementById('arrivalDate').classList.remove('is-invalid');
    document.getElementById('arrivalTime').classList.remove('is-invalid');
  }

  var departureDate = document.getElementById('departureDate').value.trim();
  var departureTime = document.getElementById('departureTime').value.trim();
  if (!departureDate || !departureTime) {
    isValid = false;
    document.getElementById('departureDate').classList.add('is-invalid');
    document.getElementById('departureTime').classList.add('is-invalid');
  } else {
    document.getElementById('departureDate').classList.remove('is-invalid');
    document.getElementById('departureTime').classList.remove('is-invalid');
  }

  if (!isValid) {
    return;
  }

  const data = new FormData();
  data.append('records', JSON.stringify([
    {
      'input_value': $('#hotelName').val(),
      'input_code': 'input_id_1713197303',
      'input_type': "1"
    },
    {
      'input_value': $('#arrivalDate').val(),
      'input_code': 'input_id_04192',
      'input_type': "4"
    },
    {
      'input_value': $('#arrivalTime').val(),
      'input_code': 'input_id_50951',
      'input_type': "13"
    },
    {
      'input_value': $('#departureDate').val(),
      'input_code': 'input_id_92415',
      'input_type': "4"
    },
    {
      'input_value': $('#departureTime').val(),
      'input_code': 'input_id_02858',
      'input_type': "13"
    }
  ])),

    data.append('badge_id', $('#bid').val());
  var xhr = new XMLHttpRequest();
  xhr.withCredentials = true;
  xhr.addEventListener("readystatechange", function () {
    if (this.readyState === 4) {
      let res = JSON.parse(this.responseText);
      alert('Information submitted successfully');
      location.reload();
    }
  });
  xhr.open("POST", `https://app.smartevent.rw/MIM/addaccomodation`);
  xhr.send(data);

});

function isValidEmail(email) {
  var emailRegex = /\S+@\S+\.\S+/;
  return emailRegex.test(email);
}


document.getElementById('email').addEventListener('blur', function (event) {
  var email = this.value.trim();

  if (isValidEmail(email)) {
    document.getElementById('overaly').style.display = 'block';
    var data = new FormData();
    data.append('email', email);
    var xhr = new XMLHttpRequest();
    xhr.withCredentials = true;

    xhr.addEventListener("readystatechange", function () {
      if (this.readyState === 4) {
        document.getElementById('overaly').style.display = 'none';
        const response = JSON.parse(this.responseText);
        console.log(response);
        if (response.message === 'success') {
          document.getElementById('bid').value = response.data
          document.getElementById('emailHelp').innerText = response.notification;
          document.getElementById('email').classList.remove('is-invalid');
          document.getElementById('emailHelp').classList.add('text-success');
          document.getElementById('emailHelp').classList.remove('text-danger');
          enableAllInputsExcept('bookingForm');
        } else {
          document.getElementById('emailHelp').innerText = response.message;
          document.getElementById('email').classList.add('is-invalid');
          document.getElementById('emailHelp').classList.remove('text-success');
          document.getElementById('emailHelp').classList.add('text-danger');
          disableAllInputsExceptEmail('bookingForm');
        }
      }
    });

    xhr.open("POST", "https://app.smartevent.rw/MIM/accomodation");
    xhr.send(data);
  }
});


function disableAllInputsExceptEmail(formId) {
  var form = document.getElementById(formId);
  if (!form) {
    console.error("Form with ID '" + formId + "' not found.");
    return;
  }

  var inputs = form.getElementsByTagName('input');
  for (var i = 0; i < inputs.length; i++) {
    if (inputs[i].type !== 'email') {
      inputs[i].disabled = true;
      inputs[i].value = '';
    }
  }

  var button = form.querySelector('button[type="submit"]');
  if (button) {
    button.disabled = true;
  }
}


function enableAllInputsExcept(formId) {
  var form = document.getElementById(formId);
  if (!form) {
    console.error("Form with ID '" + formId + "' not found.");
    return;
  }

  var inputs = form.getElementsByTagName('input');
  for (var i = 0; i < inputs.length; i++) {
    inputs[i].disabled = false;
  }

  var button = form.querySelector('button[type="submit"]');
  if (button) {
    button.disabled = false;
  }
}


var inputs = document.getElementById('bookingForm').getElementsByTagName('input');
for (var i = 0; i < inputs.length; i++) {
  inputs[i].addEventListener('click', function (event) {
    this.classList.remove('is-invalid');
  });
}



disableAllInputsExceptEmail('bookingForm');