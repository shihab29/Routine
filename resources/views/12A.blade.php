@extends('main')

@section('pageTitle', '1.2(A)')

@section('content')

	@section('heading', '1.2(A)')


	<table style="width:100%">
	  <tr>
	    <th>8:00-8:50</th>
	    <th>8:50-9:40</th>
	    <th>9:40-10:30</th>
	    <th>10:30-11:20</th>
	    <th>11:20-12:10</th>
	    <th>12:10-1:00</th>
	    <th>1:00-1:50</th>
	    <th>1:50-2:40</th>
	    <th>2:40-3:30</th>
	  </tr>
	  <tr>

	  	@for($i=1; $i <= 54; $i++)
			
			@if($x[$i-1] != '0')
				<td>{{ $x[$i-1] }}</td>
			@else
				<td></td>
			@endif
			@if($i%9 == 0)
				</tr><tr>
			@endif
		@endfor

	</table>

@endsection

