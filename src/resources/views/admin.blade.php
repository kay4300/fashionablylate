<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
            <div class="header__admin">
                <a href="/logout" class="header__admin-link">logout</a>
            </div>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Admin</h2>
            </div>

            <!-- 検索フォーム -->
            <form class="form" method="get" action="/admin">

                <!-- 名前/メール -->
                <div class="form__group">
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input
                                type="text"
                                name="keyword"
                                placeholder="名前やメールアドレスを入力してください"
                                value="{{ request('keyword') }}" />
                        </div>
                    </div>
                </div>

                <!-- 性別 -->
                <div class="form__group">
                    <div class="form__group-content">
                        <div class="form__input--select">
                            <select name="gender">
                                <option value="">性別</option>
                                <option value="1" {{ request('gender') == '1' ? 'selected' : '' }}>男性</option>
                                <option value="2" {{ request('gender') == '2' ? 'selected' : '' }}>女性</option>
                                <option value="3" {{ request('gender') == '3' ? 'selected' : '' }}>その他</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- お問い合わせの種類 -->
                <div class="form__group">
                    <div class="form__group-content">
                        <div class="form__input--select">
                            <select name="category_id">
                                <option value="">お問い合わせの種類</option>
                                @foreach( $categories as $category)
                                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                                    {{ $category->content }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <!-- 日付 -->
                <div class="form__group">
                    <div class="form__group-content">
                        <div class="form__input--text">
                            <input
                                type="date"
                                name="created_at"
                                value="{{ request('created_at') }}" />
                        </div>
                    </div>
                </div>

                <!-- ボタン -->
                <div class="form__button">
                    <button class="form__button-submit" type="submit">検索</button>
                    <a class="form__button-submit" href="{{ route('admin') }}">リセット</a>
                </div>

            </form>

            <!-- エクスポート -->
            <div class="form__button" style="margin-top: 20px;">
                <form method="get" action="/admin/export">
                    <button class="form__button-submit" type="submit">エクスポート</button>
                </form>
            </div>

            <!-- ページ番号（上） -->
            <div class="pagination">
                {{ $contacts->links() }}
            </div>

            <!-- テーブル -->
            <table class="admin-table">
                <tr class="admin-table__header">
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>

                @foreach($contacts as $contact)
                <tr class="admin-table__row">
                    <td>{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    <td>
                        @if($contact->gender == 1) 男性
                        @elseif($contact->gender == 2) 女性
                        @else その他
                        @endif
                    </td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->category->content }}</td>
                    <td>
                        <a class="detail-button" href="/admin/detail/{{ $contact->id }}">詳細</a>
                    </td>
                </tr>
                @endforeach
            </table>

            <!-- ページ番号（下） -->
            <div class="pagination">
                {{ $contacts->links() }}
            </div>

        </div>
    </main>

</body>

</html>