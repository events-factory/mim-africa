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
  localStorage.setItem('targetLanguage', targetLanguage);
  const elements = document.querySelectorAll('body *:not(.do-not-convert)');
  const languages = document.querySelectorAll('.do-not-convert');
  languages.forEach(element => {
    element.classList.remove('active');
  });
  document.querySelector(`.${targetLanguage.toLocaleLowerCase()}`).classList.add('active');
  for (const element of elements) {
    const htmlContent = element.innerHTML;
    const forbidden = ['ENG', 'FR', 'CH', 'POR', 'SP'];
    if (!forbidden.some((word) => htmlContent.includes(word))) {
      const translatedHtmlContent = await translateText(htmlContent, targetLanguage, 'AIzaSyDZfLqRTWjrRdmY1G4xCX3fyvNGMM7Ftfo');
      element.innerHTML = translatedHtmlContent;
    }
  }
}

$(document).ready(function () {
  $('#header_wrapper').prepend(`
      <div class="row justify-content-end">
        <div style="width: 55px;">
          <p onclick="translateWebsite('eng')" src="./lib/images/flags/united-kingdom.png" style="margin: 5px; cursor: pointer;" class="eng do-not-convert">ENG</p>
        </div>
        <div style="width: 55px;"">
          <p onclick="translateWebsite('fr')" src="./lib/images/flags/france.png" style="margin: 5px; cursor: pointer;" class="fr do-not-convert">FR</p>
        </div>
        <div style="width: 55px;"">
          <p onclick="translateWebsite('zh-CN')" src="./lib/images/flags/china.png" style="margin: 5px; cursor: pointer;" class="zh-cn do-not-convert">CH</p>
        </div>
        <div style="width: 55px;"">
          <p onclick="translateWebsite('pt')" src="./lib/images/flags/arabia.png" style="margin: 5px; cursor: pointer;" class="pt do-not-convert">POR</p>
        </div>
        <div style="width: 55px;"">
          <p onclick="translateWebsite('es')" src="./lib/images/flags/spanish.png" style="margin: 5px; cursor: pointer;" class="es do-not-convert">SP</p>
        </div>
      </div>
  `)
  const targetLanguage = localStorage.getItem('targetLanguage');
  if (targetLanguage) {
    translateWebsite(targetLanguage);
    document.querySelector(`.${targetLanguage.toLocaleLowerCase()}`).classList.add('active');
  }
});