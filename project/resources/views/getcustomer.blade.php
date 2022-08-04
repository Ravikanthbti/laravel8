<html>
<head>

    <title>formid.serilize data store</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>
<style>
.addnewclass{
    margin-right: 113px;
    margin-top: 23px;
}
</style>

<table class="table table-striped mt-4" id="tableid">

    <thead>
        <th> Post Id </th>
        <th> FirstName </th>
        <th> LastName</th>
        <th> Info </th>
    </thead>

    <tbody>
        @foreach ($posts as $post)
            <tr>
                <td> {{$post->id}} </td>
                <td> {{$post->firstName}} </td>
                <td> {{$post->lastName}} </td>
                <td> {{$post->info}} </td>
                
                    
            </tr>
        @endforeach
       
    </tbody>
</table>
<div >
      <a href="javascript:;" id="getData" >Get Data</a>
      <div >
        <div >
        
          <p id="firstname"></p>
          <p id="lastname"></p>
          <p id="info"></p>
        </h1>
        <div ></div>
      </div>
    </div>


<form id="formid" enctype="multipart/form-data" method="post">
@csrf
<table>
<tr>
<td>firstName</td>
<td><input type="text" name="firstName" id="firstName" required=""></td>
</tr>
<tr>
<td>lastName</td>
<td><input type="text" name="lastName" id="lastName" required=""></td>
</tr>
<tr>
<td>info</td>
<td><input type="text" name="info" id="info" required=""></td>
</tr>
<tr>
<td>porfile image</td>
<td><input type="file" name="profile_image" id="porfileid"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" name="submit" id="btnid" ></td>
</tr>
</table>

</form> 

</body>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
    $(document).ready(function(){
    $('#formid').submit(function(e){
      e.preventDefault();
      $('#btnid').attr('disabled',true)
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

    var formdata=$('#formid').serialize();
      //let formdata = new FormData($('#formid'));
    alert(formdata);

      $.ajax({

        url: "{{url('storecustomer')}}",
        data: formdata ,
        type:'post',
        dataType: 'JSON',
        success:function(data){
          $('#formid').trigger("reset"); //for form resete
          $('#btnid').attr('disabled',false);
          $('#tableid').DataTable().ajax.reload();
          

        console.log(data);
      }

      });


});
});



</script>
<script>
   $(document).ready(function() {
        $("#getData").click(function() { 
         $.ajax({  //create an ajax request to display.php
          type: "GET",
          url: url: "{{url('list')}}",       
          success: function (data) {
              console.log(data);
            // $("#firstName").html(data.firstName);
            // $("#lastName").html(data.lastName);
            // $("#info").html(data.info);
          }
        });
      });
      });
</script>


</html> 

















