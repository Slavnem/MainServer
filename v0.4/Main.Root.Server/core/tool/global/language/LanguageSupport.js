// Dil desteği sınıfı
export class LanguageSupport {
    // Verilere erişmeyi sağlayan değişkenler
    static key_login = "login"
    static key_description = "description";
    static key_cannotlogin = "cannotlogin";
    static key_registernow = "registernow";
    static key_infotext = "infotext";
    
    // İstenilen dile ait verileri getirtme
    static async GetLanguage(type, language, language_short, key) {
        try {
            const response = await fetch(`//main.server.com/support/language/${String(type)}/${String(language)}/${String(language_short)}/${String(key)}`);
            const data = response.json();
            return data;
        } catch(error) {
            console.error("Error: ", error);
            return null;
        }
    }
}