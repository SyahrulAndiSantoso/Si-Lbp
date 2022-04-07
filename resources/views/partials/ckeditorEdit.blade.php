<script>
    CKEDITOR.replace('soal',{
        filebrowserUploadUrl : "{{route('Ckeditor.upload', ['_token' => csrf_token()])}}",
        filebrowserUploadMethod : 'form',
    });
    CKEDITOR.replace('jawaban',{
        filebrowserUploadUrl : "{{route('Ckeditor.upload', ['_token' => csrf_token()])}}",
        filebrowserUploadMethod : 'form',
    });
    CKEDITOR.replace('isi_materi',{
        filebrowserUploadUrl : "{{route('Ckeditor.upload', ['_token' => csrf_token()])}}",
        filebrowserUploadMethod : 'form',
    });

</script>
