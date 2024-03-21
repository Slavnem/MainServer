// GİRİŞ İŞLEMLERİ SINIFI
class LoginProcess {
    static LoginCheck() {
        // Butonu ve sonrasında veriyi alma
        try {
            const dataUsername = document.querySelector(`input[type="text"][name="username"]`).value;
            const dataPassword = document.querySelector(`input[type="password"][name="password"]`).value;

            if(!dataUsername || !dataPassword)
                throw "Username Or Password Not Found!";

            // Test amaçlı çıktı
            console.log("Username: ", dataUsername);
            console.log("Password: ", dataPassword);
        } catch(error) {
            return false;
        }
    }
}

// Veri gönderme butonunu alma ve işlem yapma
try {
    const submitButton = document.querySelector(`button[type="button"][name="submit_btn"]`);

    // buton yoksa atlasın
    if(!submitButton)
        throw "Button Not Found!";

    submitButton.addEventListener("click", function() {
        LoginProcess.LoginCheck();
    });
} catch(error) {
    console.error("Error: ", error);
}