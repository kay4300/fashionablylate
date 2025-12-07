<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
            <div class="header__admin">
                <a href="/admin" class="header__admin-link">logout</a>
            </div>

        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>admin</h2>
            </div>
            <form class="form">
                <div class="form__group">
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="text" placeholder="名前やメールアドレスを入力してください" />
                        </div>
                        <div class="form__error">
                            <!--バリデーション機能を実装したら記述します。-->
                        </div>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="gender" placeholder="性別" />
                        </div>
                        <div class="form__error">
                            <!--バリデーション機能を実装したら記述します。-->
                        </div>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="category_id" placeholder="お問い合わせの種類" />
                        </div>
                        <div class="form__error">
                            <!--バリデーション機能を実装したら記述します。-->
                        </div>
                    </div>
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input type="text" name="date" placeholder="年/月/日" />
                        </div>
                        <div class="form__error">
                            <!--バリデーション機能を実装したら記述します。-->
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">検索</button>
                        <button class="form__button-submit" type="submit">リセット</button>
                    </div>
            </form>
        </div>
    </main>
</body>

</html>