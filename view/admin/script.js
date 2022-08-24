function cekform(){
    title = document.getElementById('inputType');
    author = document.getElementById('inputBrand');
    category = document.getElementById('inputColor');
    price = document.getElementById('inputPrice');
    if (title.value == ''){
        alert('Judul Buku tidak boleh kosong');
        title.focus();
        return false;
    } else if (author.value == ''){
        alert('Penulis Buku tidak boleh kosong');
        author.focus();
        return false;
    } else if (category.value == ''){
        alert('Kategori Buku tidak boleh kosong');
        category.focus();
        return false;
    } else if (price.value == ''){
        alert('Harga Buku tidak boleh kosong');
        price.focus();
        return false;
    } 
}

function convertToRupiah(angka)
{
	var rupiah = '';		
	var angkarev = angka.toString().split('').reverse().join('');
	for(var i = 0; i < angkarev.length; i++) if(i%3 == 0) rupiah += angkarev.substr(i,3)+'.';
    rupiah = rupiah.split('',rupiah.length-1).reverse().join('');
    return 'Rp. '+(rupiah.length < 1 ? '0' : rupiah)+',-';
}

function convertToAngka(rupiah)
{
	return parseInt(rupiah.replace(/,.*|[^0-9]/g, ''), 10);
}