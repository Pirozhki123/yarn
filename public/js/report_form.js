$(function() {
    if(!$('#report_type').val()) return;
    displayDetail();
    resetOptions();
});

// 報告に交換備品を追加
$(document).on('click', '.add_equipment_button', function() {
    if($('.equipment_sub_group').length >= 10) return false;
    $.get('/equipment/load_equipment', function(data) {
        $('.equipment_group').append(data);
    })
})

// 報告から交換備品を削除
$(document).on('click', '.delete_equipment_button', function() {
    if($('.equipment_sub_group').length <= 0) return false;
    $('.equipment_sub_group:last').remove();
})

// 報告種選択時、機械番号を表示
$(document).on('change', '#report_type', function() {
    $('.machine_group').show();
    resetOptions();
    $('.product_group, .size_group, .symbol_group, .report_group, .equipment_group, .option_group').hide();
    enableSelect();
    $('#machine_id, #product_id, #size_id, #symbol_id').val('');
    displaySymbolType();
});

// 機械番号選択時、品番・サイズ・記号を表示し、自動で入力
$(document).on('change', '#machine_id', function(){
    enableSelect();
    if(!$('#machine_id').val()) return;
    displayDetail();
    resetOptions();

    var machine_id = $('#machine_id').val();
    $.ajax({
        type: 'GET',
        url: '/machine/load_machine/' + machine_id,
        data: machine_id,
    }).done(function(machine) {
        $('#product_id').val(machine['product_id']);
        $('#old_size_id').val(machine['size_id']);
        $('#old_symbol_id').val(machine['symbol_id']);
        resetSize();
        resetSymbol();
        setTimeout(function() {
            disableSelect()
        }, 150);
    }).fail(function() {
        alert('機械情報の取得に失敗しました');
    }).always(function() {
        // 常時実行する処理
    });
})

$(document).on('change', 'input[type="radio"][name="symbol_type"]', function() {
    if($(this).val() == 'existing') {
        $('.symbol_group .symbol_select').show();
        $('.symbol_group .symbol_input').hide();
    } else if($(this).val() == 'new') {
        $('.symbol_group .symbol_select').hide();
        $('.symbol_group .symbol_input').show();
    }
})

function displayDetail() {
    $('.product_group, .size_group, .symbol_group, .report_group, .option_group').show();
    if($('#report_type').val() == 'switch' || $('#report_type').val() == 'repair' || $('#report_type').val() == 'malfunction') {
        $('.equipment_group').show();
    }
}

function disableSelect() {
    if($('#report_type').val() == 'switch') return;
    $('#product_id > option:not(:selected)').prop('disabled', true);
    $('#size_id > option:not(:selected)').prop('disabled', true);
    if($('#report_type').val() == 'symbol_change') return;
    $('#symbol_id > option:not(:selected)').prop('disabled', true);
}

function enableSelect() {
    $('#product_id > option').removeAttr('disabled');
    $('#size_id > option').removeAttr('disabled');
    $('#symbol_id > option').removeAttr('disabled');
}

function resetOptions() {
    $('.option_group input').removeAttr('checked').prop('checked', false).change();
    var report_type = $("#report_type").val();
    if(report_type == 'switch' || report_type == 'repair' || report_type == 'symbol_change') {
        $('.option_group .required_check').show();
        $('.option_group label, .option_group input').not('.required_check').hide();
    } else if(report_type == 'inspection') {
        $('.option_group .check_passed').show();
        $('.option_group label, .option_group input').not('.check_passed').hide();
    } else if(report_type == 'malfunction') {
        $('.option_group .stop_machine').show();
        $('.option_group label, .option_group input').not('.stop_machine').hide();
    } else {
        $('.option_group label, .option_group input').hide();
    }
}

function displaySymbolType() {
    $('input[type="radio"][name="symbol_type"][value="existing"]').prop('checked', true);
    $('.symbol_group .symbol_select').show();
    $('.symbol_group .symbol_input').hide();
    if($('#report_type').val() == 'symbol_change') {
        $('.symbol_group .symbol_type').show();
    } else {
        $('.symbol_group .symbol_type').hide();
    }
}
