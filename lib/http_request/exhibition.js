$(document).ready(function () {
  var xhr = new XMLHttpRequest();
  var currentLanguage = "en";
  xhr.addEventListener("readystatechange", function () {
    console.log(this.readyState);
    if (this.readyState === 4 && this.status === 200) {
      var res = JSON.parse(xhr.response);
      description =
        currentLanguage == "en"
          ? res.about.english_description
          : res.about.french_description;
      book_now_button =
        currentLanguage == "en" ? "Book Now" : "Reserve maintenant";

      res.products.forEach((element) => {
        package_name =
          currentLanguage == "en" ? element.name_english : element.name_french;
        package_description =
          currentLanguage == "en"
            ? element.description_english
            : element.description_french;

        $("#exhibition-packages").append(`
            <div class="blue_box package">
            <div class="row">
              <div class="twelvecol">
                <div class="sevencol">
                  <img src="${element.banner}" alt="Picture" />
                </div>

                <div class="fivecol last">
                  <div class="blue_box_content">
                    <h4>${package_name} ${element.currency} ${element.prices}</h4>

                    <ul>
                    ${package_description}
                    </ul>

                    <a
                      href="exhibition-booking.html"
                      class="button_white text-decoration-none"
                      onclick="storeExhibitionReference(${element.id})"
                      >Book Package</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
            `);
      });
    }
  });

  xhr.open(
    "GET",
    `https://app.smartevent.rw/Api/Get-Exibition-Packages-Full/List-All`
  );

  xhr.setRequestHeader(
    "Authorization",
    "+jbr7WFH2Az1R/+sa0/nyDJBWlFJZmdaczNPdEt1SjZHaG5aRXc9PQ=="
  );
  xhr.send();
});

function storeExhibitionReference(id) {
  localStorage.setItem("exhibition_reference", id);
  if (localStorage.getItem("exhibition_reference") != null) {
    window.location.href = "exhibition-booking.html";
  } else {
    console.log("Error", "No exhibition reference found");
  }
}
