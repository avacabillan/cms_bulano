<div class="page-content "style="margin: top 160px;">
    <div class="container mt-5" style="height:50%">
        
    
        <table id="files-list" class="table table-bordered"  style="width:100% ">
                <thead >
                    <tr>
                    <th class="Client-th text-dark text-center">File Name</th>
                    <th class="Client-th text-dark text-center">Description</th>
                    <th class="Client-th text-dark text-center">File type</th>
                    <th class="Client-th text-dark text-center">Action</th>   
                    </tr>
                </thead>
                <tbody>
                @foreach($itrs as $itr)
                    <tr>
                        
                        
                        <td>{{$itr->file_name}}</td>
                        <td>{{$itr->description}}</td>
                        <td>{{$itr->file_type}}</td>
                        
                      
                        
                        
                        <td>
                         
                         <a  class="btn btn-success btn-sm" href="{{ route('upload.destroy', $itr->id) }}" >Archive</a>
                         
                        </td>
                       
                       
                        
                    </tr>
                @endforeach
                </tbody>
              
            </table>
    </div>
</div>