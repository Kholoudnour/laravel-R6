<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Trashed Classes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap"
    rel="stylesheet">
  <style>
    * {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>

<body>
  <main>
    <div class="container my-5">
      <div class="bg-light p-5 rounded">
        <h2 class="fw-bold fs-2 mb-5 pb-2">Trashed Classes</h2>
        <td><form action="{{ route('deleteclass') }}" method="post">
            @csrf
            @method('DELETE')
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="submit" value="delete">
          </form>
</td>
        <table class="table table-hover">
          <thead>
            <tr class="table-dark">
            <th scope="col">Classes</th>
              <th scope="col">Capacity</th>
              
              <th scope="col">Price</th>
              <th scope="col">Timefrom</th>
              <th scope="col">Timeto</th>
              <th scope="col">Isfulled</th>
              <th scope="col">Edit</th>
              <th scope="col">Peremenant Delete</th>



            </tr>
          </thead>
          <tbody>
          <tbody>
            @foreach($classes as $class)
            <tr>
              <td scope="row">{{$class['classname']}}</td>
              <td>{{$class['capacity']}}</td>
            
              <td>{{$class['price']}}</td>
              <td>{{$class['timefrom']}}</td>
              <td>{{$class['timeto']}}</td>
              <td>{{$class['isfulled']=="1" ? "Yes": "NO"}}</td>
              <td><a href= "{{route('class.edit', $class['id'])}}">edit</a></td>
              <td><a href= "{{route('class.show', $class['id'])}}">Permenent Delete</a></td>
              <td><a href= "#"></a></td>


            </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </main>

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</html>