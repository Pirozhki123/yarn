<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => ':attribute は承認される必要があります。',
    'accepted_if' => ':other が :value の場合、:attribute は承認される必要があります。',
    'active_url' => ':attribute は有効なURLである必要があります。',
    'after' => ':attribute は :date より後の日付である必要があります。',
    'after_or_equal' => ':attribute は :date と同じか、それより後の日付である必要があります。',
    'alpha' => ':attribute は文字のみを含む必要があります。',
    'alpha_dash' => ':attribute は文字、数字、ダッシュ、アンダースコアのみを含む必要があります。',
    'alpha_num' => ':attribute は文字と数字のみを含む必要があります。',
    'array' => ':attribute は配列である必要があります。',
    'ascii' => ':attribute は半角英数字と記号のみを含む必要があります。',
    'before' => ':attribute は :date より前の日付である必要があります。',
    'before_or_equal' => ':attribute は :date と同じか、それより前の日付である必要があります。',
    'between' => [
        'array' => ':attribute は :min から :max 個の項目を含む必要があります。',
        'file' => ':attribute は :min から :max キロバイトである必要があります。',
        'numeric' => ':attribute は :min から :max の間である必要があります。',
        'string' => ':attribute は :min から :max 文字である必要があります。',
    ],
    'boolean' => ':attribute は真または偽である必要があります。',
    'can' => ':attribute には許可されていない値が含まれています。',
    'confirmed' => ':attribute の確認が一致しません。',
    'contains' => ':attribute には必須の値が欠けています。',
    'current_password' => 'パスワードが正しくありません。',
    'date' => ':attribute は有効な日付である必要があります。',
    'date_equals' => ':attribute は :date と同じ日付である必要があります。',
    'date_format' => ':attribute は :format 形式と一致する必要があります。',
    'decimal' => ':attribute は小数点以下 :decimal 桁である必要があります。',
    'declined' => ':attribute は辞退される必要があります。',
    'declined_if' => ':other が :value の場合、:attribute は辞退される必要があります。',
    'different' => ':attribute と :other は異なる必要があります。',
    'digits' => ':attribute は :digits 桁である必要があります。',
    'digits_between' => ':attribute は :min から :max 桁である必要があります。',
    'dimensions' => ':attribute の画像寸法が無効です。',
    'distinct' => ':attribute には重複する値が含まれています。',
    'doesnt_end_with' => ':attribute は次のいずれかで終了してはいけません: :values。',
    'doesnt_start_with' => ':attribute は次のいずれかで開始してはいけません: :values。',
    'email' => ':attribute は有効なメールアドレスである必要があります。',
    'ends_with' => ':attribute は次のいずれかで終了する必要があります: :values。',
    'enum' => '選択された :attribute は無効です。',
    'exists' => '選択された :attribute は無効です。',
    'extensions' => ':attribute は次の拡張子のいずれかである必要があります: :values。',
    'file' => ':attribute はファイルである必要があります。',
    'filled' => ':attribute には値が必要です。',
    'gt' => [
        'array' => ':attribute には :value を超える項目が必要です。',
        'file' => ':attribute は :value キロバイトを超える必要があります。',
        'numeric' => ':attribute は :value を超える必要があります。',
        'string' => ':attribute は :value 文字を超える必要があります。',
    ],
    'gte' => [
        'array' => ':attribute には :value 個以上の項目が必要です。',
        'file' => ':attribute は :value キロバイト以上である必要があります。',
        'numeric' => ':attribute は :value 以上である必要があります。',
        'string' => ':attribute は :value 文字以上である必要があります。',
    ],
    'hex_color' => ':attribute は有効な16進数カラーである必要があります。',
    'image' => ':attribute は画像である必要があります。',
    'in' => '選択された :attribute は無効です。',
    'in_array' => ':attribute フィールドは :other に存在する必要があります。',
    'integer' => ':attribute は整数である必要があります。',
    'ip' => ':attribute は有効なIPアドレスである必要があります。',
    'ipv4' => ':attribute は有効なIPv4アドレスである必要があります。',
    'ipv6' => ':attribute は有効なIPv6アドレスである必要があります。',
    'json' => ':attribute は有効なJSON文字列である必要があります。',
    'list' => ':attribute はリストである必要があります。',
    'lowercase' => ':attribute は小文字である必要があります。',
    'lt' => [
        'array' => ':attribute には :value 未満の項目が必要です。',
        'file' => ':attribute は :value キロバイト未満である必要があります。',
        'numeric' => ':attribute は :value 未満である必要があります。',
        'string' => ':attribute は :value 文字未満である必要があります。',
    ],
    'lte' => [
        'array' => ':attribute には :value 個以下の項目が必要です。',
        'file' => ':attribute は :value キロバイト以下である必要があります。',
        'numeric' => ':attribute は :value 以下である必要があります。',
        'string' => ':attribute は :value 文字以下である必要があります。',
    ],
    'mac_address' => ':attribute は有効なMACアドレスである必要があります。',
    'max' => [
        'array' => ':attribute には :max 個を超える項目を含めることはできません。',
        'file' => ':attribute は :max キロバイトを超えてはなりません。',
        'numeric' => ':attribute は :max を超えてはなりません。',
        'string' => ':attribute は :max 文字を超えてはなりません。',
    ],
    'max_digits' => ':attribute は :max 桁を超えてはなりません。',
    'mimes' => ':attribute は次のタイプのファイルである必要があります: :values。',
    'mimetypes' => ':attribute は次のタイプのファイルである必要があります: :values。',
    'min' => [
        'array' => ':attribute には少なくとも :min 個の項目が必要です。',
        'file' => ':attribute は少なくとも :min キロバイトである必要があります。',
        'numeric' => ':attribute は少なくとも :min である必要があります。',
        'string' => ':attribute は少なくとも :min 文字である必要があります。',
    ],
    'min_digits' => ':attribute は少なくとも :min 桁である必要があります。',
    'missing' => ':attribute フィールドは存在しない必要があります。',
    'missing_if' => ':other が :value の場合、:attribute フィールドは存在しない必要があります。',
    'missing_unless' => ':other が :value でない場合、:attribute フィールドは存在しない必要があります。',
    'missing_with' => ':values が存在する場合、:attribute フィールドは存在しない必要があります。',
    'missing_with_all' => ':values が全て存在する場合、:attribute フィールドは存在しない必要があります。',
    'multiple_of' => ':attribute は :value の倍数である必要があります。',
    'not_in' => '選択された :attribute は無効です。',
    'not_regex' => ':attribute の形式は無効です。',
    'numeric' => ':attribute は数値である必要があります。',
    'password' => [
        'letters' => ':attribute には少なくとも1文字のアルファベットを含む必要があります。',
        'mixed' => ':attribute には少なくとも1つの大文字と1つの小文字を含む必要があります。',
        'numbers' => ':attribute には少なくとも1つの数字を含む必要があります。',
        'symbols' => ':attribute には少なくとも1つの記号を含む必要があります。',
        'uncompromised' => '指定された :attribute はデータ漏洩で見つかりました。別の :attribute を選んでください。',
    ],
    'present' => ':attribute フィールドが存在する必要があります。',
    'present_if' => ':other が :value の場合、:attribute フィールドが存在する必要があります。',
    'present_unless' => ':other が :value でない場合、:attribute フィールドが存在する必要があります。',
    'present_with' => ':values が存在する場合、:attribute フィールドが存在する必要があります。',
    'present_with_all' => ':values が全て存在する場合、:attribute フィールドが存在する必要があります。',
    'prohibited' => ':attribute フィールドは禁止されています。',
    'prohibited_if' => ':other が :value の場合、:attribute フィールドは禁止されています。',
    'prohibited_unless' => ':other が :values に含まれていない場合、:attribute フィールドは禁止されています。',
    'prohibits' => ':attribute フィールドは :other が存在することを禁止します。',
    'regex' => ':attribute の形式は無効です。',
    'required' => ':attribute フィールドは必須です。',
    'required_array_keys' => ':attribute フィールドには次のエントリが必要です: :values。',
    'required_if' => ':other が :value の場合、:attribute フィールドは必須です。',
    'required_if_accepted' => ':other が承認されている場合、:attribute フィールドは必須です。',
    'required_if_declined' => ':other が拒否されている場合、:attribute フィールドは必須です。',
    'required_unless' => ':other が :values に含まれていない場合、:attribute フィールドは必須です。',
    'required_with' => ':values が存在する場合、:attribute フィールドは必須です。',
    'required_with_all' => ':values が全て存在する場合、:attribute フィールドは必須です。',
    'required_without' => ':values が存在しない場合、:attribute フィールドは必須です。',
    'required_without_all' => ':values のどれも存在しない場合、:attribute フィールドは必須です。',
    'same' => ':attribute フィールドは :other と一致する必要があります。',
    'size' => [
        'array' => ':attribute には :size 個の項目を含む必要があります。',
        'file' => ':attribute は :size キロバイトである必要があります。',
        'numeric' => ':attribute は :size である必要があります。',
        'string' => ':attribute は :size 文字である必要があります。',
    ],
    'starts_with' => ':attribute は次のいずれかで始まる必要があります: :values。',
    'string' => ':attribute は文字列である必要があります。',
    'timezone' => ':attribute は有効なタイムゾーンである必要があります。',
    'unique' => ':attribute はすでに使用されています。',
    'uploaded' => ':attribute のアップロードに失敗しました。',
    'uppercase' => ':attribute は大文字である必要があります。',
    'url' => ':attribute は有効なURLである必要があります。',
    'ulid' => ':attribute は有効なULIDである必要があります。',
    'uuid' => ':attribute は有効なUUIDである必要があります。',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
