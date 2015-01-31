@extends('layouts.master')
	@section('content')
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<table class="table">
						<thead>
							<tr>
								<th>From</th>
								<th>Subject</th>
								<th>Time</th>
							</tr>
						</thead>
						<tbody>
						@foreach ($messages as $message)
							<tr>
								<td>{{ $message->user->first_name }} {{ $message->user->last_name }}</td>
								<td>{{ $message->subject }}</td>
								<td>{{ $message->created_at }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	@stop
@stop