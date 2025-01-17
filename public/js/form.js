$(function() {
    if($('#product_id').val()) {
        resetSize();
        resetSymbol();
    }
})

// 品番変更時に関連するサイズと記号をセット
$('#product_id').on('change', function() {
    resetSize();
    resetSymbol();
})

function resetSize() {
    $('select#size_id option').remove();
    var product_id = $('#product_id').val();
    $.ajax({
        type: 'GET',
        url: '/size/' + product_id,
        data: product_id,
    }).done(function (sizes) {
        $('#size_id').append('<option value=""></option>');
        for(let key in sizes) {
            var selected = $('#old_size_id').val() == sizes[key]['id'] ? 'selected' : '';
            $('#size_id').append('<option value="' + sizes[key]['id'] +'" ' + selected + '>' + sizes[key]['size'] + '</option>');
        }
    }).fail(function () {
        alert('サイズの取得に失敗しました');
    }).always(function () {
        // 成功や失敗にかかわらず常に実行する処理
    });
}

function resetSymbol() {
    $('select#Symbol_id option').remove();
    var product_id = $('#product_id').val();
    $.ajax({
        type: 'GET',
        url: '/symbol/' + product_id,
        data: product_id,
    }).done(function (symbols) {
        $('#symbol_id').append('<option value=""></option>');
        for(let key in symbols) {
            var selected = $('#old_symbol_id').val() == symbols[key]['id'] ? 'selected' : '';
            $('#symbol_id').append('<option value="' + symbols[key]['id'] +'" ' + selected + '>' + symbols[key]['symbol'] + '</option>');
        }
    }).fail(function () {
        alert('識別記号の取得に失敗しました');
    }).always(function () {
        // 成功や失敗にかかわらず常に実行する処理
    });
}
