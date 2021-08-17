function check(){
    var name_flag=0;
    var pref_flag=0;
    var age_flag=0;
    var age_value = document.entryform.age.value;
    
    if(document.entryform.namae.value==""){
        name_flag=1;
    }else if(document.entryform.pref.value=="0"){
        pref_flag=1;
    }else if(document.entryform.age.value==""){
        age_flag=1;
    }

    if(name_flag==1){
        window.alert('名前は必須です');
        return false;
    }else if(pref_flag==1){
        window.alert('都道府県は必須です');
        return false;
    }else if(age_flag==1 || age_value < 1 || age_value > 100){
        window.alert('年齢は必須です/数値を入力してください/1-99の範囲で入力してください');
        return false;
    }else if(window.confirm('更新を行います。よろしいですか？')){
            location.href="../system/index.php";//「OK」の場合はindex.phpに移動
    }else{
            windows.alert('キャンセルされました');//警告ダイアログ
            return false;//送信を中止
    }
}
