@extends('theoryMain')

@section('pageTitle')
	{{ $roomNo }}
@endsection

@section('content')

	<div class="fixed-sn" style="text-align: center;"> 
		<!--Main layout-->
		<main >
			<div class="fluid-container pink-skin">
			<!-- action row -->

			<!-- table -->
				<div class="table-responsive-sm">
					<table class="table table-bordered text-center" id="allCourse" align="center" width="70%">
						<tr class="primary-color white-text">
							<th class="text-center" rowspan="2"></th>
							<th class="text-center" colspan="9">{{ $roomNo }}</th>
						</tr>
						<tr class="primary-color white-text">
							<th class="text-center">8:00-10:30</th>
							<th class="text-center">10:30-1:00</th>
							<th class="text-center">1:00-3:30</th>
						</tr>
						<tr>
							<td>{{ $days[0] }}</td>
							@for($i=0, $j=1; $i < 18; $i++)
								
								@if($x[$i] != '0')
									<td style="text-align: center;">{{ $x[$i] }} <br> {{ $semesterAndSection[$i] }}</td>
								@else
									<td></td>
								@endif

								@if(($i+1)%3 == 0)
									</tr><tr>
									@if($i != 17)
										<td>{{ $days[$j] }}</td>
										@php
											$j = $j + 1;
										@endphp
									@endif
								@endif

							@endfor

					</table>
				</div>
			<!-- table -->

			</div>
		</main>
	</div>
	<br><br>

@endsection