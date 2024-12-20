$.ajaxSetup({
    headers: { 'X-CSRF-TOKEN': $("[name='csrf-token']").attr("content") },
})

// オフィス新規登録のPOSTリクエスト
$(document).on("submit", "[data-office-create]", function(e) {
    // submitによるページ遷移を防ぐ
    e.preventDefault();

    const formData = $(this).serialize();

    $.ajax({
        url: '/offices',
        method: 'POST',
        data: formData,
        dataType: 'json',
    }).done(function(data) {
        location.href = `/offices`;
    }).fail(function(data) {
        insertErrorMessage(data);
    })
})

/**
 * エラーメッセージを挿入する
 * @param data
 */
function insertErrorMessage(data) {

    const errorField = $('[data-error-message]');
    const errors = 'responseJSON' in data && data.responseJSON.errors ?? null;

    // エラーメッセージがない場合処理を抜ける
    if (errors === null) {
        errorField.html('エラーが発生しました');
        return;
    }

    // エラーのリスト要素を構築
    let errorMessage = '';
    for (const key in errors) {
        errorMessage += `<li>${errors[key]}</li>`;
    }

    // エラーフィールドに挿入
    errorField.html(errorMessage);
}
