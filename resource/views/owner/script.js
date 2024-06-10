var keyword    = document.getElementById('keyword');
var tombolcari = document.getElementById('tombol-cari');
var tombolcari = document.getElementById('container');

keyword.addEventListener('keyup', function(){
    // buat objek AJAX
    var xhr = new XMLHttpRequest();

    // cek kesiapan ajax
    xhr.onreadystatechange = function(){
        if(CharacterData.readyState == 4 && xhr.status == 200){

        }
    }

    // eksekusi
    xhr.open('GET', 'ajax/coba.txt', true);
    xhr.send();

});

    