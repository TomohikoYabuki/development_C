//入力フォームに対してのバリデーションチェックをするファイル
function check(){
    var name_flag=0;
    var pref_flag=0;
    var age_flag=0;
    var age_value = document.mainform.age.value;

    //入力判定
    if(document.mainform.namae.value==""){
        name_flag=1;
    }else if(document.mainform.pref.value=="0"){
        pref_flag=1;
    }else if(document.mainform.age.value==""){
        age_flag=1;
    }

    //エラー文表示
    if(name_flag==1){
        window.alert('名前は必須です');
        return false;
    }

    if(pref_flag==1){
        window.alert('都道府県は必須です');
        return false;
    }

    if(age_flag==1 || age_value < 1 || age_value > 100){
        window.alert('年齢は必須です/数値を入力してください/1-99の範囲で入力してください');
        return false;
    }

    if(window.confirm('更新を行います。よろしいですか？')){
        document.mainform.submit();//「OK」の場合はindex.phpに移動
    }//else{
        //windows.alert('キャンセルされました');//警告ダイアログ
        //return false;//送信を中止
    //}
}
