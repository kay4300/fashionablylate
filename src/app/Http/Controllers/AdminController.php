<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Contact;

class AdminController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        $contacts = Contact::paginate(7);

        return view('admin', compact('categories', 'contacts'));
    }

    // public function search(Request $request)
    // {
    //     $query = Contact::with('category');

    //     // 検索条件が全部反映される
    //     $query = $this->getSearchQuery($request, $query);
    //     // dd($query->toSql(), $query->getBindings());


    //     // ページネーション。検索条件が維持される。
    //     $contacts = $query->paginate(7)->appends($request->query());
    //     // CSV用（ページングなし）
    //     $csvData = $query->get();

    //     $categories = Category::all();

    //     return view('admin', compact('contacts', 'categories', 'csvData'));
    // }
    public function search(Request $request)
    {
        $query = Contact::with('category');

        // 検索条件が1つでも入っているか判定
        $hasSearch = $request->filled('keyword') ||
            $request->filled('gender') ||
            $request->filled('category_id') ||
            $request->filled('created_at');
        // 検索条件が１つでもあればgetSearchQueryが呼ばれる。検索条件なし(false)のときは絞り込みフィルターなしで全件($query)取得
        if ($hasSearch) {
            $query = $this->getSearchQuery($request, $query);
        }

        // ページネーション。検索条件はURLに保持。検索あり→絞り込みのまま。検索条件なし→全件取得。
        $contacts = $query->paginate(7)->appends($request->query());
        $csvData = $query->get();

        $categories = Category::all();

        return view('admin', compact('contacts', 'categories', 'csvData'));
    }


    private function getSearchQuery(Request $request, $query)
    {
        // !empty()で空文字nullを無視する
        if (!empty($request->keyword)) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('first_name', 'like', "%{$keyword}%") 
                    ->orWhere('last_name', 'like', "%{$keyword}%") 
                    ->orWhere('email', 'like', "%{$keyword}%");
            });
        }
        // 性別
        if (!empty($request->gender)) {
            $query->where('gender', $request->gender);
        }
        // カテゴリー
        if (!empty($request->category_id)) {
            $query->where('category_id', $request->category_id);
        }

        // 日付
        if (!empty($request->created_at)) {
            $query->whereDate('created_at', $request->created_at);
        }
        return $query;
    }
    // モーダルウィンドウ。/admin/detail/{id}にアクセスすると対象データを渡しでviewに表示
    public function detail($id)
    {
        $contact = Contact::with('category')->findOrFail($id);
        return view('admin_detail', compact('contact'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/admin')->with('message', 'データを削除しました');
    }
    // public function export(Request $request)
    // {
    //     $query = Contact::query();

    //     $query = $this->getSearchQuery($request, $query);

    //     $csvData = $query->get()->toArray();

    //     $csvHeader = [
    //         'id',
    //         'category_id',
    //         'first_name',
    //         'last_name',
    //         'gender',
    //         'email',
    //         'tell',
    //         'address',
    //         'building',
    //         'detail',
    //         'created_at',
    //         'updated_at'
    //     ];

    //     $response = new StreamedResponse(function () use ($csvHeader, $csvData) {
    //         $createCsvFile = fopen('php://output', 'w');

    //         mb_convert_variables('SJIS-win', 'UTF-8', $csvHeader);

    //         fputcsv($createCsvFile, $csvHeader);

    //         foreach ($csvData as $csv) {
    //             $csv['created_at'] = Date::make($csv['created_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
    //             $csv['updated_at'] = Date::make($csv['updated_at'])->setTimezone('Asia/Tokyo')->format('Y/m/d H:i:s');
    //             fputcsv($createCsvFile, $csv);
    //         }

    //         fclose($createCsvFile);
    //     }, 200, [
    //         'Content-Type' => 'text/csv',
    //         'Content-Disposition' => 'attachment; filename="contacts.csv"',
    //     ]);

    //     return $response;
    // }
}
