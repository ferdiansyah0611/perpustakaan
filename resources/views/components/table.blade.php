<table class="table table-hover">
	<thead>
		<tr>
			<th>#</th>
			@foreach($field as $row)
				<th>{{ $row['name'] }}</th>
			@endforeach
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		@if(count($rows) === 0)
			<tr>
				<td class="text-center" colspan="{{count($field) + 1}}">No Data Available</td>
			</tr>
		@endif
		@foreach($rows as $index => $row)
			<tr>
				<td>{{ $row->id }}</td>
				@foreach($field as $column)
					@if($column['option'] && $column['option']['handle'])
						@if(isset($column['option']['disable_xss']))
							<td>{!! call_user_func($column['option']['handle'], $row) !!}</td>
						@else
							<td>{{ call_user_func($column['option']['handle'], $row) }}</td>
						@endif
					@else
						<td>{{ $row[$column['key']] }}</td>
					@endif
				@endforeach
				<td>
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							Action
						</button>
						<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
							@if(isset($option['is_fines_index']) && $row->status === 'borrowed')
								<form action="{{route('fines.store')}}" method="post">
									@csrf @method('POST')
									<input type="hidden" name="borrowing_id" value="{{$row->id}}">
									<input type="hidden" name="amount" value="{{$row->total_fines}}">
									<button type="submit" class="dropdown-item">Mark As Paid</button>
								</form>
							@endif
							@if(!isset($option['disable_edit']))
								<a class="dropdown-item" href="{{route($option['route'] . '.edit', [$row->id])}}">Edit</a>
							@endif
							<form action="{{route($option['route'] . '.destroy', [$row->id])}}" method="post">
								@csrf @method('DELETE')
								<button type="submit" class="dropdown-item">Remove</button>
							</form>
						</div>
					</div>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>