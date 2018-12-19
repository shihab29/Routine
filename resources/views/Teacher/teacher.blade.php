@extends('mainTeacher')

@section('pageTitle')
	{{ $teacher_name }}
@endsection

@section('content')

	<div class="fixed-sn"> 
		<!--Main layout-->
		<main >
			<div class="fluid-container pink-skin">
			<!-- action row -->

			<!-- table -->
				<div class="table-responsive-sm">
					<table class="table table-bordered text-center" id="allCourse" align="center">
						<tr class="primary-color white-text">
							<th class="text-center" rowspan="2"></th>
							<th class="text-center" colspan="9" style="text-align: center;">{{ $teacher_name }}</th>
						</tr>
						<tr class="primary-color white-text">
							<th class="text-center">8:00-8:50</th>
							<th class="text-center">8:50-9:40</th>
							<th class="text-center">9:40-10:30</th>
							<th class="text-center">10:30-11:20</th>
							<th class="text-center">11:20-12:10</th>
							<th class="text-center">12:10-1:00</th>
							<th class="text-center">1:00-1:50</th>
							<th class="text-center">1:50-2:40</th>
							<th class="text-center">2:40-3:30</th>
						</tr>
						<tr>
							<td>{{ $days[0] }}</td>
							@for($i=0, $j=1; $i < 54; $i++)
								
								@if($x[$i] != '0')
									<td style="text-align: center;">{{ $x[$i] }} <br> {{ $theory_room_list[$i] }} <br> {{ $theory_semester_studentgroup[$i] }}</td>
								@elseif($y[$i] != '0')
									<td colspan="3" style="text-align: center;">{{ $y[$i] }} <br> {{ $lab_room_list[$i] }} <br> {{ $lab_semester_studentgroup[$i] }}</td>
									@php
										$i = $i+2;
									@endphp
								@else
									<td></td>
								@endif

								@if(($i+1)%9 == 0)
									</tr><tr>
									@if($i != 53)
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

	<div class="fixed-sn"> 
		<!--Main layout-->
		<main >
			<div class="fluid-container pink-skin">
			<!-- action row -->

			<!-- table -->
				<div class="table-responsive-sm">
					<table class="table table-bordered text-center" id="allCourse" align="center">
						<tr class="primary-color white-text">
							<th class="text-center">Course No</th>
							<th class="text-center">Year/Semester</th>
							<th class="text-center">Course Title</th>
							<th class="text-center">Credit Hour</th>
						</tr>

						@foreach($course_list as $key=>$course)
							<tr>
								<td>{{ $course->CourseNo }}</td>
								<td>{{ $course->ysID }}</td>
								<td>{{ $course->CourseTitle }}</td>
								<td>{{ $course->CreditHour }}</td>
															
							</tr>
						@endforeach

					</table>
				</div>
			<!-- table -->

			</div>
		</main>
	</div>

@endsection