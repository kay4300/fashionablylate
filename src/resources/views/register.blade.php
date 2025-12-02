<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>FashionablyLate - Register</title>
    <link rel="stylesheet" href="style.css" />
</head>

<body>
    <!-- Top bar -->
    <header class="topbar" aria-label="Site header">
        <div class="brand">FashionablyLate</div>
        <a href="#" class="login-link">login</a>
    </header>

    <!-- Centered registration card -->
    <main class="page">
        <section class="card" aria-label="Registration">
            <h1 class="title">Register</h1>

            <form class=form action="/register" method="post">
                @csrf
                <div class="field">
                    <label for="name" class="label">お名前</label>
                    <input
                        id="name"
                        name="name"
                        type="text"
                        class="input"
                        placeholder="例: 山田　太郎"
                        autocomplete="name"
                        required />
                </div>

                <div class="field">
                    <label for="email" class="label">メールアドレス</label>
                    <input
                        id="email"
                        name="email"
                        type="email"
                        class="input"
                        placeholder="例: test@example.com"
                        autocomplete="email"
                        required />
                </div>

                <div class="field">
                    <label for="password" class="label">パスワード</label>
                    <input
                        id="password"
                        name="password"
                        type="password"
                        class="input"
                        placeholder="例: coachtechno6"
                        autocomplete="new-password"
                        required />
                </div>

                <button type="submit" class="submit">登録</button>
            </form>
        </section>
    </main>
</body>

</html>