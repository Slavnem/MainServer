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
                    "login" => "Login"
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
                    "login" => "Login"
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