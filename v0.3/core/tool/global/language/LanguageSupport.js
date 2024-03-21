// Dil desteği sınıfı
class LanguageSupport {
    // İstenilen dile ait verileri getirtme
    static async GetLanguage(language, language_short, key) {
        try {
            const response = await fetch(`https://main.server.com/support/language/${String(language)}/${String(language_short)}/${String(key)}`);
            const data = response.json();
            return data;
        } catch(error) {
            console.error("Error: ", error);
            return null;
        }
    }
}

// Butonu al
/*
var btn = document.querySelector("button[type='button']");

// Butona tıklandığnıda
btn.addEventListener("click", function() {
    var DataLanguage; // dile ait verileri tutacak olan değişken

    let text_language;
    let text_language_short;
    let text_key;

    try {
        // metinleri alıyoruz
        text_language = document.querySelector(`input[name="username"]`).value;
        text_language_short = document.querySelector(`input[name="password"]`).value;
        text_key = document.querySelector(`input[name="key"]`).value;
    } catch(error) {
        // verilerin hangisinde hata varsa onu boşlukla doldursun
        text_language = !text_language ? "" : text_language;
        text_language_short = !text_language_short ? "" : text_language_short;
        text_key = !text_key ? "" : text_key;
    } finally {
        // değer girilmiş ya da girilmemiş olsun
        // veryifi fetch ediyoruz
        LanguageSupport.GetLanguage(text_language, text_language_short,text_key).then(data => {
            DataLanguage = data; // veriyi değişkene atama

            // konsol çıktısı
            console.log(DataLanguage);
        });
    }
});
*/