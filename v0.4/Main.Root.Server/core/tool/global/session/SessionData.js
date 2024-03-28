// OTURUM VERİLERİ SINIFI
export class SessionData {
    // Oturum verilerini alıcak olan fonksiyon
    static async SessionFetch() {
        try {
            const response = await fetch(`//main.server.com/session/fetch`);
            const data = response.json();
            return data;
        } catch(error) {
            console.error(`Session Fetch Error: ${error}`);
            return;
        }
    }

    // Kullanıcıya ait verileri getirtmek
    static async SessionUser(username, password) {
        try {
            // paratmetreleri almak
            const params = {
                username: String(username),
                password: String(password)
            };

            // fetch ile api ya sorgu göndermek
            const response = await fetch(`//main.server.com/api/users/data`, {
                method: "POST",
                headers: {
                    'Content-Type' : 'application/json; charset=UTF-8'
                },
                body: JSON.stringify(params)
            });

            // sorgu sonucunu almak
            const data = response.json();

            // sorgu sonucunu döndürmek
            return data;
        } catch(error) {
            // hata fırlatma
            console.error(`Session User Error: ${error}`);
            return;
        }
    }

    static async SessionSave(userdata) {
        try {
            // api sorgusu yapmak
            const response = await fetch(`//main.server.com/session/update`, {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json; charset=UTF-8',
                },
                body: JSON.stringify(userdata)
            });

            // alınan sonucu döndürmek
            return response.json();
        } catch(error) {
            // hata fırlatmak
            console.error(`Session Save Error: ${error}`);
            return;
        }
    }
}