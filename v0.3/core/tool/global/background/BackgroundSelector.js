// ARKAPLAN SEÇİCİ SINIFI
class BackgroundSelector {
    static async GetBackground(backgroundid) {
        try {
            const response = await fetch(`https://main.server.com/support/background/${parseInt(backgroundid)}`);
            const data = response.json();
            return data;
        } catch(error) {
            console.error("Error: ", error);
            return null;
        }
    }

    static ChangeBackground(element, backgroundid) {
        try {
            BackgroundSelector.GetBackground(parseInt(backgroundid)).then(data => {
                try {
                    // urk var mı yok mu kontrol
                    // eğer yoksa boş dönücek ve eğer herhangi bir veri yoksa
                    // hata yakalıyacak ve o da boş dönecek
                    if(data["url"] == null)
                        return;
                }
                catch(error) {
                    // background bulunamadı
                    console.error("Background Not Found!");
                    return;
                }

                try {
                    // element bulunamadı
                    if(!element) {
                        console.error("Element Not Found!");
                        return;
                    }

                    // element stili
                    element.style.background = `url(${data["url"]})`;
                    element.style.backgroundRepeat = "no-repeat";
                    element.style.backgroundPosition = "center";
                    element.style.backgroundSize = "cover";
                } catch(error) {
                    return;
                }
            });
        } catch(error) {
            console.error("Error: ", error);
        }
    }
}

BackgroundSelector.ChangeBackground(document.querySelector(`main`));