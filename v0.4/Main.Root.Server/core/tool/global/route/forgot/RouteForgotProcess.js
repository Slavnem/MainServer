// Gerekli Dosyalar
import { BackgroundSelector } from "//main.server.com/core/tool/global/background/BackgroundSelector.js";
import { LanguageSupport } from "//main.server.com/core/tool/global/language/LanguageSupport.js";
import { SessionData } from "//main.server.com/core/tool/global/session/SessionData.js";

// Arkaplan için işlemler
try {
    BackgroundSelector.ChangeBackground(document.querySelector(`main#id_forgotroute_main`), null, "dark-linear");
} catch(error) {
    console.error("Background Change Error!");
}