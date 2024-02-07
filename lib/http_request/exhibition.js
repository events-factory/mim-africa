$(document).ready(function () {
  var xhr = new XMLHttpRequest();

  xhr.addEventListener("readystatechange", function () {
    console.log(this.readyState);
    if (this.readyState === 4 && this.status === 200) {
      var res = JSON.parse(xhr.response);

      console.log(res);
    }
  });

  xhr.open(
    "GET",
    `https://app.smartevent.rw/Api/Get-Exibition-Packages-Full/List-All`
  );
  xhr.setRequestHeader(
    "Authorization",
    "x9JCSQhxAbyMVtV2gZUyYFFZVjRNdGpRNVdNdUdzTUhxbHFzNFE9PQ=="
  );
  xhr.send();
});

function storeExhibitionReference(id) {
  localStorage.setItem("exhibition_reference", id);
  if (localStorage.getItem("exhibition_reference") != null) {
    window.location.href = "/ExhibitionBooking/en";
  } else {
    console.log("Error", "No exhibition reference found");
  }
}
