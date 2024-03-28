export class IconSelect {
    static async GetIcon(iconkey) {
        try {
            const response = await fetch(`//main.server.com/support/icon/${parseInt(iconkey)}`);
            const data = response.json();
            return data;
        } catch(error) {
            throw ("Icon Error: ", error);
        }
    }
}