<?php

// $ php artisan make:controller TweetController --resource
// でコントローラーついか
// コントローラとルーティングを作成する．今回のコントローラ名はTweetControllerとする．
// --resourceをつけることで，よく使用する処理（代表的な CRUD 処理）を一括して作成することができる．


// 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ↓2行追加１０.３   中の処理で使いたいものへのしょうりゃく？
// validatorとは？
use Validator;
use App\Models\Tweet;


class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//一覧画面のviewへコントロール//10.3

    {
        // １０.３
        // return view('tweet.index'); ->10.4
                // return view('tweet.index', [
                //     'tweets' => []  ->10.6
                // この上のでtweetsにからのデータを入れてindex.bladeに渡している
        $tweets = Tweet::getAllOrderByUpdated_at();
            // 10.4 追記
            return view('tweet.index', [
                'tweets' => []//tweetsって名前で空のデータをviewファイルに渡している

        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() //ツイートを入力する画面
    {
        return view('tweet.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // バリデーション
        $validator = Validator::make($request->all(), [
            'tweet' => 'required | max:191',
            'description' => 'required',
        ]);
        // バリデーション:エラー
        if ($validator->fails()) {
            return redirect()
            ->route('tweet.create')
            ->withInput()
            ->withErrors($validator);
        }
        // create()は最初から用意されている関数
        // 戻り値は挿入されたレコードの情報
        $result = Tweet::create($request->all());
        // ルーティング「todo.index」にリクエスト送信（一覧ページに移動）
        return redirect()->route('tweet.index');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
