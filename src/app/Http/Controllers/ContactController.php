<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Category;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }
    //フォーム入力画面から確認画面へ値を渡しviewで表示する
    public function confirm(ContactRequest $request)
    {
        // 入力値をすべて取得
        // $contact = $request->all();

        // バリデーション済みのデータを取得
        $contact = $request->validated();

        // 電話番号を結合して 'tel' キーを作成
        $contact['tel'] = ($contact['tel1'] ?? '') . '-' . ($contact['tel2'] ?? '') . '-' . ($contact['tel3'] ?? '');
        $contact['building'] = $request->input('building', '');

        $data['gender'] = (int)$contact['gender'];

        // セッションに保存、修正ボタンを押したときに使用
        $request->session()->put('contact', $contact);

        // gender もビューに渡す
        $gender = $contact['gender'] ?? '';

        // categoryを取得（例: Categoryモデルを使用してIDから取得）
        $category = null;
        if (!empty($contact['category_id'])) {
            $category = \App\Models\Category::find($contact['category_id']);
        }

        // 確認画面に入力値を表示
        return view('confirm', compact('contact', 'gender', 'category'));
    }
    // 確認画面から完了画面へ値を渡しviewで表示する
    public function send(ContactRequest $request)
    {
        $action = $request->input('action');
        $contactData = $request->session()->get('contact');

        if ($action === 'edit') {
            // 修正ボタン → 入力画面に戻る
            return redirect('index')->withInput($contactData);
        }
        if ($action === 'send' && $contactData) {
            // 送信ボタン → DB保存
            Contact::create($contactData);
        }        
            if ($contactData) {
            // 送信ボタン → DB保存
            Contact::create($contactData);

            // セッション削除
            $request->session()->forget('contact');

            return redirect('/thanks');
        }

        return redirect('/')->with('error', 'セッションデータがありません');
    // $contact = $request->all();
    // // DBへの保存
    // Contact::create($contact);
    // return view('thanks');
    }
    public function thanks()
    {
        return view('thanks');
    }
    
}
