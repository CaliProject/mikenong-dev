<!doctype html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <form method="POST" action="{{ url('products/upload') }}" id="dropzone-form" enctype="multipart/form-data" onsubmit="uploadPhoto()">
        {!! csrf_field() !!}
        <div class="fallback">
            <input id="file-upload" name="photo" type="file" accept="image/*" onchange="this.form.submit()" />
        </div>
    </form>

    <script src="{{ elixir('js/app.js') }}"></script>
    <script src="{{ url('js/ajaxfileupload.js') }}"></script>
    <script>
        function uploadPhoto() {
            var formData = new FormData();
            formData.append('file', $('input#file-upload').files[0]);
            formData.append('_token', "{{ csrf_token() }}");

            $.ajax({
                url: "{{ url('products/upload') }}",
                processData: false,  // tell jQuery not to process the data
                contentType: false,  // tell jQuery not to set contentType
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function (json) {
                    if (json.status == "ok") {
                        console.log(json.url);
                    }
                }
            });
        }
    </script>
</body>
</html>