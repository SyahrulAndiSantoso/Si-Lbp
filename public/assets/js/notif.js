var btn = document.getElementById('hapus');

if(btn){
  btn.onclick = function(){
    Swal.fire({
        icon: 'success',
        title: 'Oops...',
        text: 'Something went wrong!'
      })
}
}

const flashData = $('.flash-data').data('flashdata');
const Halaman = $('.flash-data').data('halaman');
if(flashData == "Menambahkan"||flashData == "Mengupdate"||flashData == "Menghapus"){
  iziToast.success({
    title: 'Berhasil',
    message: flashData+' '+Halaman,
});
}else if(flashData == "Gagal"){
  iziToast.error({
    title: flashData,
    message: 'Menambahkan'+' '+Halaman,
    position: 'topRight'
});
}else if(flashData == "gagal"){
  iziToast.error({
    title: 'Login',
    message: Halaman+' '+flashData,
    position: 'topRight'
});
}else if(flashData == "sukses"){
  iziToast.success({
    title: 'Login',
    message: Halaman+' '+flashData,
});
}

// Tombol Hapus

$('.tombol-hapus').on('click', function(e){

e.preventDefault();
const href = $(this).attr('href');
Swal.fire({
  title: 'Apakah anda yakin?',
  text: "data latihan akan dihapus",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Hapus Data!'
}).then((result) => {
  if (result.value) {
    document.location.href = href;
  }
})
});