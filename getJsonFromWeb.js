var txt = document.querySelector('html').innerText;
var txt_arr = [];
txt_arr = txt.split("\n");
var data = new Object();

for(var i = 0; i < txt_arr.length; i++){
    data[txt_arr[i]] = "";
}

var json = JSON.stringify(data);

var jsonWindow = window.open('');
jsonWindow.document.querySelector('html').innerText = json;