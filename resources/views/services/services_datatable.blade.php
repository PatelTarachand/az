@php 
use Illuminate\Http\Request;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\AdminController;
@endphp
<table class="table table-bordered">
    <thead>
      <tr>
        <th>#</th>
        <th>Category</th>
        <th>Sub Category</th>
        <th>Decsription</th>
        <th>Address</th>
        <th>Status</th>
        <th>Assign Service</th>
        
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

        @foreach ($data as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td>{{ isset($row->categories->name) ? $row->categories->name : '' }}</td>
            <td>{{ isset($row->sub_categories->subCategoryName) ? $row->sub_categories->subCategoryName : '' }}</td>
          
            <td>{{ $row->description }}</td>
            <td>{{ $row->manual_address }}</td>
            <td>
              @if($row->status == 0)
              Waiting for Approval
              @elseif($row->status == 1)
                   Task Assigned             
              @elseif($row->status == 2)
                  Proccessing                
              @endif
            </td>
            <td>
            @if(isset($row->service_man_id))
             {{ WebsiteController::getValue('users','id',$row->service_man_id,'name') }}
            @else
            <?php
              $get_service_man_list = AdminController::getServiceManList($row->sub_category_id);
            ?>
                <select name="service_man_id" style="width: 100%;" id="service_man_id{{ $row->id }}" class="form-control show-popover  js-select2-basic service_man_id" data-trigger="hover" data-content="Select Sevice Man Here."  data-placement="top">
                    <option value="" >-Select-</option>
                    @foreach($get_service_man_list->unique('id') as $patel)
                    <option value="{{ $patel->id }}">{{ $patel->name }}</option>
                    @endforeach
                     
                </select>
                 @endif   
            </td>
           
            <td>
            @if(!isset($row->service_man_id))
                <a class="btn btn-success" onclick="AssignTask({{ $row->id }})"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Update</a>
            @endif
            </td>
        </tr>
        @endforeach
     
    </tbody>
  </table>

  {!! $data->render() !!}