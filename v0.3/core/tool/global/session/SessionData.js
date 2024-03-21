// OTURUM VERİLERİ SINIFI
class SessionData {
    // Oturum verilerini alıcak olan fonksiyon
    static async Session() {
        try {
            const response = await fetch(`https://main.server.com/support/session`);
            const data = response.json();
            return data;
        } catch(error) {
            console.error("Error: ", error);
            return null;
        }
    }

    // Alınan verileri getirip fonksiyon ile değerlendirmek
    static GetSession() {
        // oluşturulan yeni obje ile verileri almak
        SessionData.Session().then(data => {
            console.log(data);
        })
    }
}

// Test amaçlı fonksiyonu kullanmak
SessionData.GetSession();