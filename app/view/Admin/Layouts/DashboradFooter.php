</body>
<script src="/Assets/DashboardStyle/js/jquery-3.4.1.min.js"></script>
<script src="/Assets/DashboardStyle/js/js.js"></script>
<script src="/Assets/DashboardStyle/ckeditor5/build/ckeditor.js"></script>
<script src="/Assets/DashboardStyle/bootstrap-icons/bootstrap-icons.json"></script>
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