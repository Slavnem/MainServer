// Gerekli Dosyalar
import { BackgroundSelector } from "//main.server.com/core/tool/global/background/BackgroundSelector.js";
import { SessionData } from "//main.server.com/core/tool/global/session/SessionData.js";
import { LanguageSupport } from "//main.server.com/core/tool/global/language/LanguageSupport.js";
import { IconSelect } from "//main.server.com/core/tool/global/icon/IconSelect.js";

// GİRİŞ İŞLEMLERİ SINIFI
class LoginProcess {
    static LoginCheck() {
        // Butonu ve sonrasında veriyi alma
        try {
            const dataUsername = document.querySelector(`input[name="username"]`).value;
            const dataPassword = document.querySelector(`input[name="password"]`).value;

            if(!dataUsername || !dataPassword) {
                console.error(`Username Or Password Not Found!`);
                return;
            }

            // Kullanıcı giriş denemesi
            try {
                // girilen değerleri parametre oalrak almak
                const params = {
                    username: String(dataUsername),
                    password: String(dataPassword)
                };

                // parametrelerle kullanıcı girişi sorgusu yaptırmak
                fetch(`//main.server.com/api/users/verify`, {
                    method: "POST",
                    headers: {
                        'Content-Type' : 'application/json; charset=UTF-8'
                    },
                    body: JSON.stringify(params)
                })
                .then(response => {
                    return response.json();
                })
                .then(data => {
                    switch(Boolean(data)) {
                        case true: // login
                            // Oturum kayıt işlemleri
                            SessionData.SessionSave(params).then(data => {
                                console.log("Oturum Kaydedildi: ", data);
                            });
                            return true;
                        default: // fail
                            console.error(`Login Fail [${Date().toLocaleString()}]`);
                            return false;
                    }
                })
            } catch(error) {
                console.error(`Login Status Check Failure! [${Date().toLocaleString()}]`);
            }
        } catch(error) {
            console.error(`Login Process Not Working! [${Date().toLocaleString()}]`);
        }
    }
}

// Input Password şifre gösterme/gizleme
try {
    const element_input_pwd = document.querySelector(`input[name="password"]`);

    element_input_pwd.addEventListener("dblclick", function() {
        element_input_pwd.type = (element_input_pwd.type == "password" ? "text" : "password");
    });
} catch(error) {
    console.error("Password Input Element Not Found!");
}

// Dil için işlemler
try {
    LanguageSupport.GetLanguage("basic", "tr", "tr", "page_login").then(data => {
        try {
            document.querySelector(`h1#id_textarea_title`).innerText = data[LanguageSupport.key_login];
            document.querySelector(`button#id_submit_btn[name="submit_btn"]`).innerText = data[LanguageSupport.key_login];
            document.querySelector(`p#id_textarea_description`).innerText = data[LanguageSupport.key_description];
            document.querySelector(`a#id_forgot_btn`).innerText = data[LanguageSupport.key_cannotlogin];
            document.querySelector(`a#id_redirect_signup`).innerText = data[LanguageSupport.key_registernow];
            document.querySelector("p#id_info_text").innerText = data[LanguageSupport.key_infotext];
        } catch(error) {
            console.error("Language Change Error: Element Not Found!");
        }
    });
} catch(error) {
    console.error("Unable To Retrieve Language Data: ", error);
}

// Arkaplan için işlemler
try {
    BackgroundSelector.ChangeBackground(document.querySelector(`main`), null, "dark-linear");
} catch(error) {
    console.error("Background Change Error!");
}

// Veri gönderme butonunu alma ve işlem yapma
try {
    // butonu al
    const submitButton = document.querySelector(`button[type="button"][name="submit_btn"]`);

    // buton yoksa atlasın
    if(!submitButton)
        throw (`Error: Button Not Found!`);

    submitButton.addEventListener("click", function() {
        // Oturum durumunu değişkene kaydet
        var loginStatus = LoginProcess.LoginCheck();

        // Oturum başarılı ise
        if(loginStatus) {
            // Oturum bilgilerini alıp çıktı vermek
            SessionData.SessionFetch().then(session => {
                console.log("Oturum Verileri: ", session);
            });
        }
    });
} catch(error) {
    console.error("Error: ", error);
}

// Info butonu için
try {
    // Elementleri alma
    const elementInfoBtn = document.querySelector(`button#id_info_btn_question`);
    const elementInfoArea = document.querySelector(`div#id_infoarea`);
    const elementInfoText = document.querySelector(`p#id_info_text`);

    // Buton içeriğini değiştirme
    IconSelect.GetIcon("question").then(data => {
        elementInfoBtn.innerHTML = data;
    });

    // Metini gizleme ve gösterme
    elementInfoBtn.addEventListener("click", function() {
        elementInfoText.style.display = (elementInfoText.style.display !== "flex")  ? ("flex") : ("none");
    });
} catch(error) {
    throw ("Icon Info Error: ", error);
}