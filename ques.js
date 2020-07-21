var user = garoon.base.user.getLoginUser();
document.forms.ques1.login_user.value = user.code;

function clickBtn() {
  var response = window.confirm('回答を送信しますか？');
  if (response) {
    window.alert("ご回答ありがとうございました。");
    return true;
  } else {
    return false;
  }
}
