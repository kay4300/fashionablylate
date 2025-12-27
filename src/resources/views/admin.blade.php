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
                <h1>FashionablyLate</h1>
            </a>
            <div class="header__admin">
                <!-- <a href="/logout" class="header__admin-link">logout</a> -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">
                        logout
                    </button>
                </form>
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
                            <input type="text" name="keyword" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword') }}" />
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
                            <input type="date" name="created_at" value="{{ request('created_at') }}" />
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
                    <td>{{ $contact->category->content ?? '未選択' }}</td>

                    <td>
                        <!-- <a class="detail-button" href="/admin/detail/{{ $contact->id }}">詳細</a> -->
                        <a href="#modal-{{ $contact->id }}" class="detail-button">詳細</a>

                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </main>
    <!-- モーダルウィンドウ -->
    @foreach($contacts as $contact)
    <div class="modal" id="modal-{{ $contact->id }}">
        <a href="#" class="modal-overlay"></a>

        <div class="modal__inner">
            <div class="modal__content">

                <form class="modal__detail-form" action="{{ route('admin.delete') }}" method="post">
                    @method('DELETE')
                    @csrf

                    <div class="modal-form__group">
                        <label class="modal-form__label">お名前</label>
                        <p>{{ $contact->last_name }} {{ $contact->first_name }}</p>
                    </div>

                    <div class="modal-form__group">
                        <label class="modal-form__label">性別</label>
                        <p>
                            @if($contact->gender == 1) 男性
                            @elseif($contact->gender == 2) 女性
                            @else その他
                            @endif
                        </p>
                    </div>

                    <div class="modal-form__group">
                        <label class="modal-form__label">メールアドレス</label>
                        <p>{{ $contact->email }}</p>
                    </div>

                    <div class="modal-form__group">
                        <label class="modal-form__label">電話番号</label>
                        <p>{{ $contact->tel }}</p>
                    </div>

                    <div class="modal-form__group">
                        <label class="modal-form__label">住所</label>
                        <p>{{ $contact->address }}</p>
                    </div>

                    <div class="modal-form__group">
                        <label class="modal-form__label">お問い合わせの種類</label>
                        <p>{{ $contact->category->content }}</p>
                    </div>

                    <div class="modal-form__group">
                        <label class="modal-form__label">お問い合わせ内容</label>
                        <p>{{ $contact->detail }}</p>
                    </div>

                    <input type="hidden" name="id" value="{{ $contact->id }}">
                    <input class="modal-form__delete-btn btn" type="submit" value="削除">
                </form>

            </div>

            <!-- ×で閉じる -->
            <a href="#" class="modal__close-btn">×</a>
        </div>
    </div>
    @endforeach
</body>

</html>