<!-- Edit Modal -->
<div class="modal fade" id="edit{{$datacomments->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Edit Comment</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                  {!! Form::model($datacomments, [ 'method' => 'patch','route' => ['Comment.update', $datacomments->id] ]) !!}
                      <div class="mb-3">
                          {!! Form::label('Content', 'Content') !!}
                          {!! Form::text('Content', $datacomments->content, ['class' => 'form-control']) !!}
                      </div>
                      <div class="mb-3">
                          {!! Form::label('Enable', 'Enable') !!}
                          {!! Form::text('enable', $datacomments->enable, ['class' => 'form-control']) !!}
                      </div>
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              {{Form::button('<i class="fa fa-check-square-o"></i> Update', ['class' => 'btn btn-success', 'type' => 'submit'])}}
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>
   
  <!-- Delete Modal -->
  <div class="modal fade" id="delete{{$datacomments->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Delete datacomments</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              {!! Form::model($datacomments, [ 'method' => 'delete','route' => ['Comment.delete', $datacomments->id] ]) !!}
                  <h4 class="text-center">Are you sure you want to delete </h4>
                  <h4 class="text-center">this comment?</h4>

          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
              {{Form::button('<i class="fa fa-trash"></i> Delete', ['class' => 'btn btn-danger', 'type' => 'submit'])}}
              {!! Form::close() !!}
          </div>
      </div>
    </div>
  </div>

  {{-- view reply --}}
  <div class="modal fade" id="viewReply{{$datacomments->id}}" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="myModalLabel">Replycomments</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                <div class="row ">
                  <div class="col-sm-4">ID</div>
                  <div class="col-sm-4">Content</div>
                  <div class="col-sm-4">Vibile</div>
                </div>
                @foreach($Replycomments as $DataReplycomments)
                @if($DataReplycomments->idcomment == $datacomments->id)
                <div class="row pt-3">
                  <div class="col-sm-4">{{$DataReplycomments->id}}</div>
                  <div class="col-sm-4">{{$DataReplycomments->content}}</div>
                  @if($DataReplycomments->visible == "true")
                  <div class="col-sm-4"><a href="{{route("changeVisible", $DataReplycomments->id)}}"><i class="bi bi-eye-fill"></i></a></div>
                  @else 
                  <div class="col-sm-4"><a href="{{route("changeVisible", $DataReplycomments->id)}}"><i class="fa-solid fa-eye-slash"></i></a></div>
                  @endif
                </div>
                @endif
                @endforeach 
          </div> 
      </div>
    </div>
  </div>