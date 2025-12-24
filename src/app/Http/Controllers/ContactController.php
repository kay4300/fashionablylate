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
        // デバッグ用
        // dd($request->all());

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
        $genderText = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ][$contact['gender'] ?? 0];


        // categoryを取得（例: Categoryモデルを使用してIDから取得）
        $category = null;
        if (!empty($contact['category_id'])) {
            $category = Category::find($contact['category_id']);
            $categoryText = $category ? $category->content : '未選択';
        } else {
            $categoryText = '未選択';
        }

        // 確認画面に入力値を表示
        return view('confirm', compact('contact', 'genderText', 'categoryText'));
    }
    // GETで直接アクセスされたときに、セッションからcontactを読み出して確認画面を表示する
    public function showConfirm(Request $request)
    {
        $contact = $request->session()->get('contact');
        if (!$contact) {
            return redirect()->route('index');
        }

        $genderText = [
            1 => '男性',
            2 => '女性',
            3 => 'その他',
        ][$contact['gender'] ?? 0];

        if (!empty($contact['category_id'])) {
            $category = Category::find($contact['category_id']);
            $categoryText = $category ? $category->content : '未選択';
        } else {
            $categoryText = '未選択';
        }

        return view('confirm', compact('contact', 'genderText', 'categoryText'));
    }
    // 確認画面から完了画面へ値を渡しviewで表示する
    public function send(Request $request)
    {
        $action = $request->input('action');
        $contactData = $request->session()->get('contact');
        if (!$contactData) {
            return redirect('/')->with('error', 'セッションデータがありません');
        }
        if ($action === 'edit') {
            // 修正ボタン → 入力画面に戻る
            return redirect()->route('index')->withInput($contactData);
        }
        // 送信ボタン → DB保存
        if ($action === 'send') {
            $contactData['tel'] = ($contactData['tel1'] ?? '') . '-' . ($contactData['tel2'] ?? '') . '-' . ($contactData['tel3'] ?? '');

            Contact::create($contactData);
        }

        // セッション削除
        $request->session()->forget('contact');

        return redirect()->route('thanks');
    }

    public function thanks()
    {
        return view('thanks');
    }
}
