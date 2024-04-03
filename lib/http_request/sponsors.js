$(document).ready(function () {
  var xhr = new XMLHttpRequest();
  xhr.withCredentials = true;
  xhr.addEventListener("readystatechange", function () {
    if (this.readyState === 4 && this.status === 200) {
      var res = JSON.parse(xhr.response);
      console.log(res);
      const sponsors_list = res.data.filter(
        (item) => item.element === "sponsors_logo"
      );
      sponsors_list.forEach((element, index) => {
        $("#sponsors").append(`
          <div class="col-lg-2 col-md-3 col-sm-6 p-3 sponsors">
            <a href="https://www.rbc.gov.rw/" target="_blank">
                <img src="${res.images_root}/${element.content}" alt="Smart Event - Events Factory" class="partners-logo">
            </a>
          </div>
        `);
      });
    }
  });
  xhr.open("GET", `https://sandbox.smartevent.rw/Api/Get-Sponsors-Api-Lite`);

  xhr.setRequestHeader(
    "Authorization",
    "EAvo3eJ/ZjdHIZOa9qYD309QYlpHaFpHK29HRHkrY3ZiTFhOdXc9PQ=="
  );
  xhr.send();
  xhr.send();
});
