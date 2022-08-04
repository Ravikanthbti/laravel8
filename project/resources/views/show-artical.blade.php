@extends('layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                
            </div>
            <div class="pull-right">
                
            </div>
        </div>
    </div>
   
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Image</th>
            <th width="280px">Action</th>
        </tr>
        <?php 
        $i=0;
        ?>
        @foreach ($articals as $artical)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $artical->name }}</td>
            <td>{{ $artical->description }}</td>
            <td>{{ $artical->price }}</td>
             <td> <img src="{{ asset('assets/upload/artical/' .$artical->avatar) }}" class="rounded-circle" alt="{{  $artical->avatar }}" width="40" height="40" id="profile_image"></td>




            <td>

            <a href="{{url('edit-artical/'.$artical->id)}}"> Edit</a>    
            <a href="{{url('delete-artical/'.$artical->id)}}" onclick="return confirm('Are you sure?')"> Delete</a>    
            </td>
            
        </tr>
        @endforeach
    </table>
  
    
      
@endsection