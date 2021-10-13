<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h3 class="text-center">QucikERP Report</h3>
    <p>Report Type:{{ucfirst($data[0]->getTable())}} Report</p>
    <p>Generated On:{{date('d-m-Y H:i:s')}}</p>
    <hr class="bg-primary">
    <div class="table-responsive-sm" style="font-size:12px">
        @php
            $keys=array_keys($data[0]->getAttributes());
            for($i=0;$i<count($keys);$i++){
                $col=$keys[$i];
                if($col=="id"||$col=="added_since"||$col=="actions"||$col=="updated_at"||$col=="created_at"||$col=="eoq"||$col=="danger_level"){
                    array_splice($keys,$i,$i);
                }
            }
        @endphp
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                @foreach ($keys as $col)
                @if($col!="id")
                    <th>{{$col}}</th>
                @endif
                @endforeach
            </tr>
            </thead>
            <tbody>
                @foreach ($data as $col)
                    <tr>
                        <th scope="row">{{$loop->iteration}}</th>
                        @foreach ($keys as $key)
                        @if($key!="id")
                            <td>{{$col->$key}}</td>
                        @endif
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
            <hr>
        </table>
    </div>

</body>
<script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</script>
</html>

