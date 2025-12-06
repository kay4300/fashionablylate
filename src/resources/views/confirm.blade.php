<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FAshionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Fashionablylate
            </a>
        </div>
    </header>

    <main>
        <div class="confirm__content">
            <div class="confirm__heading">
                <h2>confirm</h2>
            </div>
            <form class="form" method=post action="{{ route('confirm.send') }}">
                @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text">
                                <input type="text" value="{{ $contact['last_name'] }} {{ $contact['first_name'] }}" readonly>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                <input type="text" value="@if (($gender ?? '') === 'male')
                                男性
                                @elseif (($gender ?? '') === 'female')
                                女性
                                @elseif (($gender ?? '') === 'other')
                                その他
                                @else
                                未選択
                                @endif" readonly>

                                <!-- <input type="text" value="@if ($gender === 'male')
                                男性
                                @elseif ($gender === 'female')
                                女性
                                @elseif ($gender === 'other')
                                その他
                                @else
                                未選択
                                @endif" readonly> -->

                            </td>
                        </tr>

                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                <input type="email" name="email" value="{{ $contact['email'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-table__text">
                                <input type="tel" name="tel" value="{{ $contact['tel'] }}" readonly />
                            </td>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-table__text">
                                <input type="text" name="address" value="{{ $contact['address'] }}" readonly />
                            </td>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物名</th>
                            <td class="confirm-table__text">
                                <input type="text" name="building" value="{{ $contact['building'] }}" readonly />
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせの種類</th>
                            <td class="confirm-table__text">
                                <input type="text" value="@if ($category)
                                {{ $category->name }}
                                @else
                                未選択
                                @endif" readonly>
                            </td>
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-table__text">
                                <input type="text" name="detail" value="{{ $contact['detail'] }}" readonly />
                            </td>
                        </tr>
                    </table>
                </div>
                
            <form class="form" method="post" action="{{ route('confirm.send') }}">
                @csrf
                <div class="form__button">
                    <button type="submit" name="action" value="send" class="form__button-submit">送信</button>
                    <button type="submit" name="action" value="edit" class="form__button-submit">修正</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>