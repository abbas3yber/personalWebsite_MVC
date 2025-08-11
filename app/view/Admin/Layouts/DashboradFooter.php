</body>
<script src="/dashboard_style/js/jquery-3.4.1.min.js"></script>
<script src="/dashboard_style/js/js.js"></script>
<script src="/dashboard_style/ckeditor5/build/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#editor'), {
            language: 'fa',
            toolbar: [
                'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote',
                '|', 'undo', 'redo'
            ]
        })
        .catch(error => {
            console.error(error);
        });
</script>

</html>