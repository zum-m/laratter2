<!-- 10.4フォルダ・ファイル追加  10.4 -->

<!-- 共通パーツ（エラー表示）の作成
入力値が不正な場合などはエラー画面を表示して対応する．

tweet の入力や編集など複数の画面で必要となるため，共通のコンポーネントとして作成する．

latavel_tweet/resources/viewsの中にcommonフォルダを作成する． commonフォルダの中にerrors.blade.phpファイルを作成する．

errors.blade.phpに以下の内容を記述する． -->



  @if (count($errors) > 0)
  <div>
    <div class="font-medium text-red-600">
      {{ __('Whoops! Something went wrong.') }}
    </div>

    <ul class="mt-3 list-disc list-inside text-sm text-red-600">
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  @endif

