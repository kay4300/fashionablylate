<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FashionController extends Controller
{
    public function index()
    {
        return view('index');
    }
    //フォーム入力画面から確認画面へ値を渡しviewで表示する
    public function confirm(Request $request)
    {
        // 入力値をすべて取得
        $contact = $request->all();

        // セッションに保存、修正ボタンを押したときに使用
        $request->session()->put('contact', $contact);

        // 確認画面に入力値を表示
        return view('confirm', compact('contact'));
    }
    // 確認画面から完了画面へ値を渡しviewで表示する
    public function store(Request $request)
    {
        $contact = $request->all();
        // DBへの保存
        Contact::create($contact);
        return view('thanks');
    }
}
