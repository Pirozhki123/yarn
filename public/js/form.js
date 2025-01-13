$(function() {
    resetSize();
    resetSymbol();
})

$('#product_id').on('change', function() {
    resetSize();
    resetSymbol();
})

$(document).on('click', '.add_equipment_button', function() {
    if($('.equipment_sub_group').length >= 10) return false;
    $.get('/report/load_equipment', function(data) {
        $('.equipment_group').append(data);
    })
})

$(document).on('click', '.delete_equipment_button', function() {
    if($('.equipment_sub_group').length <= 0) return false;
    $('.equipment_sub_group:last').remove();
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
            var selected = $('#old_size_id').val() == sizes[key]['id'] ? 'selected' : null;
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
        for(let key in symbols) {
            var selected = $('#old_symbol_id').val() == symbols[key]['id'] ? 'selected' : null;
            $('#symbol_id').append('<option value="' + symbols[key]['id'] +'" ' + selected + '>' + symbols[key]['symbol'] + '</option>');
        }
    }).fail(function () {
        alert('識別記号の取得に失敗しました');
    }).always(function () {
        // 成功や失敗にかかわらず常に実行する処理
    });
}
