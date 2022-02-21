
                        
<title>
  Form
</title>
<style>
.rwd-table {
  margin: auto;
  min-width: 300px;
  max-width: 100%;
  border-collapse: collapse;
}
.rwd-table tr:first-child {
  border-top: none;
  background: #428bca;
  color: #fff;
}
.rwd-table th,
.rwd-table td {
  text-align: left;
}
.btn {
  background-color: blue;
  color: white;
  padding: 5px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
  border-radius: 5px;
}
@media screen and (min-width: 600px) {
  .rwd-table tr:hover:not(:first-child) {
    background-color: #d8e7f3;
  }
  .rwd-table th,
  .rwd-table td {
    padding: 1em !important;
  }
}
</style>


<div class="container">
    <a href="{{url()->previous()}}" class="btn btn-primary">Back</a><br>
    <table class="rwd-table" style="width: 80%; border-radius: .4em;">
        <tbody>
            <tr>
                <th>File Name</th> 
                <th>Description</th>
                <th>File Type</th>
                <th>Action</th>
            </tr>
            @foreach($datas as $pay)
                <tr>
                    <td>{{$pay->file_name}}</td>
                    <td>{{$pay->description}}</td>
                    <td>{{$pay->file_type}}</td>
                    <td><button><a href="{{url('/view',$pay->id)}}">View</a></button></td>
                                    
                </tr>
            @endforeach    
        </tbody>
    </table>
</div>


                       