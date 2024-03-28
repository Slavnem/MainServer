// ARKAPLAN SEÇİCİ SINIFI
export class BackgroundSelector {
    static async GetBackground(backgroundid) {
        try {
            const response = await fetch(`//main.server.com/support/background/${parseInt(backgroundid)}`);
            const data = response.json();
            return data;
        } catch(error) {
            console.error("Error: ", error);
            return null;
        }
    }

    static ChangeBackground(element, backgroundid, colortype) {
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
                    switch(colortype) {
                        case 0:
                        case "dark-linear":
                            element.style.background = `linear-gradient(145deg, rgba(0,0,0,30%), rgba(0,0,0,60%)), url(${data["url"]})`;
                            break;
                        default:
                            element.style.background = `url(${data["url"]})`;
                            break;
                    }
                    
                    element.style.backgroundRepeat = "no-repeat";
                    element.style.backgroundPosition = "center";
                    element.style.backgroundSize = "cover";
                } catch(error) {
                    return;
                }
            });
        } catch(error) {
            console.error("Background Selector Error: ", error);
        }
    }
}