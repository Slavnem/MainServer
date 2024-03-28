<?php
class LanguageData {
    public static $ALLANGUAGES = [
        "en",
        "ru",
        "tr"
    ];

    public static $ALLSUBLANGUAGES = [
        "en" => [ // en
            "us", "uk"
        ],
        "ru" => [ // ru
            "ru"
        ],
        "tr" => [ // tr
            "tr"
        ]
    ];

    // LANGUAGE
    public static $LANGUAGESDATA = [
        "en" => [
            "us" => [ // EN
                "page_login" => [ // LOGIN PAGE
                    "login" => "Login",
                    "description" => "Welcome To The Main Server",
                    "cannotlogin" => "I cannot Login",
                    "registernow" => "If you don't have an account, create one right now...",
                    "infotext" => "If you click twice in succession on the password entry section, you can see the password you entered as text and if you click again in succession, you can see it again as a password"
                ],
                "page_register" => [ // REGISTER PAGE
                    "register" => "Register"
                ],
                "page_homepage" => [ // HOMEPAGE
                    "homepage" => "Homepage"
                ]
            ],
            "uk" => [ // EN
                "page_login" => [ // LOGIN PAGE
                    "login" => "Login",
                    "description" => "Welcome To The Main Server",
                    "cannotlogin" => "I can't login",
                    "registernow" => "If you don't have an account, create one right now...",
                    "infotext" => "If you click twice in succession on the password entry section, you can see the password you entered as text and if you click again in succession, you can see it again as a password"
                ],
                "page_register" => [ // REGISTER PAGE
                    "register" => "Register"
                ],
                "page_homepage" => [ // HOMEPAGE
                    "homepage" => "Homepage"
                ]
            ]
        ],
        "tr" => [
            "tr" => [ // TR
                "page_login" => [ // LOGIN PAGE
                    "login" => "Giriş Yap",
                    "description" => "Ana Sunucu'ya Hoşgeldiniz",
                    "cannotlogin" => "Giriş yapamıyorum",
                    "registernow" => "Eğer bir hesabınız yoksa, hemen şimdi bir tane oluşturun...",
                    "infotext" => "Şifre giriş bölümüne iki kez üst üste tıklarsanız girdiğiniz şifreyi metin olarak, tekrar üst üste tıklarsanız şifre olarak görebilirsiniz"
                ],
                "page_register" => [ // REGISTER PAGE
                    "register" => "Kayıt Ol"
                ],
                "page_homepage" => [ // HOMEPAGE
                    "homepage" => "Anasayfa"
                ]
            ]
        ],
        "ru" => [
            "ru" => [ // RU
                "page_login" => [ // LOGIN PAGE
                    "login" => "Войти",
                    "description" => "Добро Пожаловать На Главный Сервер",
                    "cannotlogin" => "Я не могу войти в систему",
                    "registernow" => "Если у вас нет аккаунта, создайте его прямо сейчас...",
                    "infotext" => "Если вы дважды подряд нажмете на раздел ввода пароля, вы увидите введенный вами пароль в виде текста, а если вы нажмете еще раз подряд, то снова увидите его в виде пароля"
                ],
                "page_register" => [ // REGISTER PAGE
                    "register" => "Зарегистрируйтесь"
                ],
                "page_homepage" => [ // HOMEPAGE
                    "homepage" => "Домашняя Страница"
                ]
            ]
        ]
    ];
}
?>