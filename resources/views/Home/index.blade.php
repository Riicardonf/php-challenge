<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Challenge</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/basic.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/global.css">

</head>
<body>
    <div class="content">
        <div class="form">
        <form action="{{route('uploads')}}" method="POST" enctype="multipart/form-data" class="dropzone dz-clickable" id="my-dropzone">
            @csrf
                <div class="dz-message">
                    Suas XMLS aqui
                </div>
            </form>
        </div>
        <div class="mt-3">
            <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">Nome do Arquivo</th>
                    <th class="text-center" scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr>
                            <td>{{ $file->getFilename() }}</td>
                            <td class="text-center">
                                <button type="button" onclick="startProcess('{{$file->getFilename()}}');" class="btn btn-success btn-sm">Processar</button>
                            </td>
                        </tr>
                    @endforeach
              </table>
        </div>

    </div>

@include('Home.scripts')
<script>

    function startProcess(filename){

        const token = '{{ csrf_token() }}';

        $.ajax({
            method: 'POST',
            url: "{{ route('ajax.process.xml') }}",
            data: {_token: token, filename},
            success: function(data){
                console.log(data);
            }
        });

    }

</script>

</body>
</html>
