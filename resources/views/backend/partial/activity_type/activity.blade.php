education 
electronics
 assembly.
carpentry.
food service.
forklift operation.
furniture re-finishing.
hand/machine sewing.
kitchen management.
laundry service.


id
name

<div>
        <label for="name"><b>Inmate_Id</b></label>

        <select name="inmate_id" id="" class="form-control">
            @foreach($inma as $data)
            <option value="{{$data->inmate_id}}"></option>

            @endforeach

        </select>
    </div>