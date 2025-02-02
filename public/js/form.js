$(function() {
    if($('#product_id').val()) {
    }
})

// 機械番号選択時、品番・サイズ・記号を表示し、自動で入力
$(document).on('change', 'select#machine_id', function(){
    if(!$('select#machine_id').val()) return;

    var machine_id = $('#machine_id').val();
    $.ajax({
        type: 'GET',
        url: '/machine/load_machine/' + machine_id,
        data: machine_id,
    }).done(function(machine) {
        $('#old_product_number').html(machine['product']['product_number']);
        $('#old_size').html(machine['size']['size']);
        $('#old_symbol').html(machine['symbol']['symbol']);
        $('#old_machine_status').html(machine['machine_status_name']);
        setProductInfo();
    }).fail(function() {
        alert('問題が発生しました。ページをリロードしてください。');
    }).always(function() {
        // 常時実行する処理
    });
})

$(document).on('change', 'select#product_id', function() {
    setProductInfo();
})

// 報告に交換備品を追加
$(document).on('click', '.add_equipment_button', function() {
    if($('.equipment_sub_group').length >= 10) return false;
        console.log('data');
    $.get('/equipment/load_equipment', function(data) {
        $('.equipment_group').append(data);
    })
})

// 報告から交換備品を削除
$(document).on('click', '.delete_equipment_button', function() {
    if($('.equipment_sub_group').length <= 0) return false;
    $('.equipment_sub_group:last').remove();
})

function setProductInfo() {
    if(!$('#product_id').val()) return;
    var product_id = $('#product_id').val();
    console.log(product_id);
    setSizeSelect(product_id);
    setSymbolSelect(product_id);
}

function setSizeSelect(product_id) {
    $('select#size_id option').remove();
    $.ajax({
        type: 'GET',
        url: '/size/' + product_id,
        data: product_id,
    }).done(function (sizes) {
        // selectに関連するサイズを追加
        $('select#size_id').append('<option value=""></option>');
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

function setSymbolSelect(product_id) {
    $('select#symbol_id option').remove();
    $.ajax({
        type: 'GET',
        url: '/symbol/' + product_id,
        data: product_id,
    }).done(function (symbols) {
        $('select#symbol_id').append('<option value=""></option>');
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
