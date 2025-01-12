$(function() {
    resetSize();
    resetSymbol();
})

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
        for(let key in sizes) {
            // TODO:値保持
            $('#size_id').append('<option value="' + sizes[key]['id'] +'">' + sizes[key]['size'] + '</option>');
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
        for(let key in symbols) {
            // TODO:値保持
            $('#symbol_id').append('<option value="' + symbols[key]['id'] +'">' + symbols[key]['symbol'] + '</option>');
        }
    }).fail(function () {
        alert('識別記号の取得に失敗しました');
    }).always(function () {
        // 成功や失敗にかかわらず常に実行する処理
    });
}
