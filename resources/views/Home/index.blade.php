<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Challenge</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.2/basic.min.css"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
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
            <a href="{{ route('index') }}" class="btn btn-primary btn-sm mb-2">Carregar Arquivos para tabela</a>
            <table class="table table-sm">
                <thead>
                  <tr>
                    <th scope="col">Nome do Arquivo</th>
                    <th class="text-center" scope="col">Ação</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($files as $file)
                        <tr id="row">

                            <td>{{ $file->getFilename() }}</td>
                            <td class="text-center">
                                <button  type="button" onclick="startProcess('{{$file->getFilename()}}');" class="btn btn-success btn-sm">Processar</button>
                            </td>
                        </tr>
                    @endforeach
              </table>
        </div>

    </div>

@include('Home.scripts')
<script>

    function startProcess(filename){
        console.log($(this))

        const token = '{{ csrf_token() }}';

        $.ajax({
            method: 'POST',
            url: "{{ route('ajax.process.xml') }}",
            data: {_token: token, filename},
            beforeSend: function(){
                Swal.fire({
                    title: 'Processando XML...',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });
            },
            success: function(data){
                if(data[1] === 200){
                    Swal.fire({
                        icon: 'success',
                        text: data[0].original,
                        showConfirmButton: false
                    });
                }else{
                    Swal.fire({
                        icon: 'error',
                        text: 'Something wrong',
                        showConfirmButton: false
                    });
                }

                window.setTimeout(function () {
                    location.reload();
                }, 1000)

            }
        });

    }

</script>

</body>
</html>
