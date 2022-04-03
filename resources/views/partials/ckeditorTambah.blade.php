<script>
    ClassicEditor
        .create(document.querySelector('#soal'))
        .catch(error => {
            console.error(error);
        });
    ClassicEditor
        .create(document.querySelector('#jawaban'))
        .catch(error => {
            console.error(error);
        });

</script>
