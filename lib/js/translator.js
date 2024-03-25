// Function to translate text using Google Translate API
async function translateText(text, targetLanguage, apiKey) {
  const url = `https://translation.googleapis.com/language/translate/v2?key=${apiKey}`;
  const payload = {
    q: text,
    target: targetLanguage
  };

  try {
    const response = await fetch(url, {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify(payload)
    });

    if (!response.ok) {
      return 'Error translating text';
    }

    const data = await response.json();
    return data.data.translations[0].translatedText;
  } catch (error) {
    console.error('Error:', error);
  }
}

// Function to translate entire website
async function translateWebsite(targetLanguage) {
  const elements = document.querySelectorAll('body *');
  for (const element of elements) {
    const htmlContent = element.innerHTML;
    const translatedHtmlContent = await translateText(htmlContent, targetLanguage, 'AIzaSyDZfLqRTWjrRdmY1G4xCX3fyvNGMM7Ftfo');
    element.innerHTML = translatedHtmlContent;
}
}

$(document).ready(function () {
  $('#header_wrapper').prepend(`
      <div class="row justify-content-end">
        <div style="width: 55px;">
          <img  onclick="translateWebsite('en')" src="./lib/images/flags/united-kingdom.png" style="height: 30px;margin: 10px; cursor: pointer;" class="img-fluid">
        </div>
        <div style="width: 55px;"">
          <img  onclick="translateWebsite('fr')" src="./lib/images/flags/france.png" style="height: 30px;margin: 10px; cursor: pointer;" class="img-fluid">
        </div>
        <div style="width: 55px;"">
          <img  onclick="translateWebsite('zh-CN')" src="./lib/images/flags/china.png" style="height: 30px;margin: 10px; cursor: pointer;" class="img-fluid">
        </div>
        <div style="width: 55px;"">
          <img  onclick="translateWebsite('sa')" src="./lib/images/flags/arabia.png" style="height: 30px;margin: 10px; cursor: pointer;" class="img-fluid">
        </div>
        <div style="width: 55px;"">
          <img  onclick="translateWebsite('es')" src="./lib/images/flags/spanish.png" style="height: 30px;margin: 10px; cursor: pointer;" class="img-fluid">
        </div>
      </div>
  `)
});