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
// async function translateWebsite(targetLanguage) {
//   localStorage.setItem('targetLanguage', targetLanguage);
//   const elements = document.querySelectorAll('body *:not(.do-not-convert)');
//   const languages = document.querySelectorAll('.do-not-convert');
//   languages.forEach(element => {
//     element.classList.remove('active');
//   });
//   document.querySelector(`.${targetLanguage.toLocaleLowerCase()}`).classList.add('active');
//   for (const element of elements) {
//     const htmlContent = element.innerHTML;
//     const forbidden = ['ENG', 'FR', 'CH', 'POR', 'SP'];
//     if (!forbidden.some((word) => htmlContent.includes(word))) {
//       const translatedHtmlContent = await translateText(htmlContent, targetLanguage, 'AIzaSyDZfLqRTWjrRdmY1G4xCX3fyvNGMM7Ftfo');
//       element.innerHTML = translatedHtmlContent;
//     }
//   }
// }

// $(document).ready(function () {
//   const targetLanguage = localStorage.getItem('targetLanguage');
//   if (targetLanguage) {
//     translateWebsite(targetLanguage);
//     document.querySelector(`.${targetLanguage.toLocaleLowerCase()}`).classList.add('active');
//   }
// });