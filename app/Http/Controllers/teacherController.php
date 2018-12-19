<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Teacher_Routine;

class teacherController extends Controller
{
    public function returnTheory($theories, $x, $days){
    	foreach($theories as $theory){
	 		for($i=0; $i<6; $i++){
	 			if($theory->Day == $days[$i]){
	 				if($theory->Starting_Time == '08:00:00')
	 					{$x[$i*9 + 0] = $theory->CourseNo;}
			 		if($theory->Starting_Time == '08:50:00')
			 			{$x[$i*9 + 1] = $theory->CourseNo;}
			 		if($theory->Starting_Time == '09:40:00')
			 			{$x[$i*9 + 2] = $theory->CourseNo;}
			 		if($theory->Starting_Time == '10:30:00')
			 			{$x[$i*9 + 3] = $theory->CourseNo;}
			 		if($theory->Starting_Time == '11:20:00')
			 			{$x[$i*9 + 4] = $theory->CourseNo;}
			 		if($theory->Starting_Time == '12:10:00')
			 			{$x[$i*9 + 5] = $theory->CourseNo;}
			 		if($theory->Starting_Time == '13:00:00')
			 			{$x[$i*9 + 6] = $theory->CourseNo;}
			 		if($theory->Starting_Time == '13:50:00')
			 			{$x[$i*9 + 7] = $theory->CourseNo;}
			 		if($theory->Starting_Time == '14:40:00')
			 			{$x[$i*9 + 8] = $theory->CourseNo;}
	 			}
	 		}
	 	}

	 	// for($i=0; $i<54; $i++) {
	 	// 	print_r($x[$i].' ');
	 	// 	if(($i+1)%9 == 0) {
	 	// 		print_r('<br>');
	 	// 	}
	 	// }

	 	return $x;
    }

    public function returnLab($labs, $x, $days){
    	foreach($labs as $lab){
	 		for($i=0; $i<6; $i++){
	 			if($lab->Day == $days[$i]){
	 				if($lab->Starting_Time == '08:00:00'){
	 					$x[$i*9 + 0] = $lab->CourseNo;
	 					$x[$i*9 + 1] = $lab->CourseNo;
	 					$x[$i*9 + 2] = $lab->CourseNo;
	 				}

	 				if($lab->Starting_Time == '10:30:00'){
	 					$x[$i*9 + 3] = $lab->CourseNo;
	 					$x[$i*9 + 4] = $lab->CourseNo;
	 					$x[$i*9 + 5] = $lab->CourseNo;
	 				}

	 				if($lab->Starting_Time == '13:00:00'){
	 					$x[$i*9 + 6] = $lab->CourseNo;
	 					$x[$i*9 + 7] = $lab->CourseNo;
	 					$x[$i*9 + 8] = $lab->CourseNo;
	 				}
	 			}
	 		}
	 	}

	 	// for($i=0; $i<54; $i++) {
	 	// 	print_r($x[$i].' ');
	 	// 	if(($i+1)%9 == 0) {
	 	// 		print_r('<br>');
	 	// 	}
	 	// }

	 	return $x;
    }

    public function courseList($teacherID) {
        $lists;
        $lists = Teacher_Routine::select('CourseNo', 'CourseTitle', 'StudentGroup', 'CourseType', 'ysID')->where('TeacherID', $teacherID)->where('StudentGroup', '<>', 2)->distinct('CourseNo')->get();

        foreach($lists as $list) {
            if($list->CourseType == 'Lab') {
                if($list->StudentGroup == 1)
                    $list->CreditHour = 1.5;
                else
                    $list->CreditHour = 0.75;
            }
            else {
                $list->CreditHour = 3;
            }
        }

        // foreach($lists as $list) {
        //     print_r($list->CourseNo.' '.$list->CourseTitle.' '.$list->CreditHour.'<br>');
        // }

        // print_r('<br>-------------------------------<br>');

        return $lists;
    }

    public function theoryRoomList($theories, $x, $days){
        foreach($theories as $theory){
            for($i=0; $i<6; $i++){
                if($theory->Day == $days[$i]){
                    if($theory->Starting_Time == '08:00:00')
                        {$x[$i*9 + 0] = $theory->RoomNo;}
                    if($theory->Starting_Time == '08:50:00')
                        {$x[$i*9 + 1] = $theory->RoomNo;}
                    if($theory->Starting_Time == '09:40:00')
                        {$x[$i*9 + 2] = $theory->RoomNo;}
                    if($theory->Starting_Time == '10:30:00')
                        {$x[$i*9 + 3] = $theory->RoomNo;}
                    if($theory->Starting_Time == '11:20:00')
                        {$x[$i*9 + 4] = $theory->RoomNo;}
                    if($theory->Starting_Time == '12:10:00')
                        {$x[$i*9 + 5] = $theory->RoomNo;}
                    if($theory->Starting_Time == '13:00:00')
                        {$x[$i*9 + 6] = $theory->RoomNo;}
                    if($theory->Starting_Time == '13:50:00')
                        {$x[$i*9 + 7] = $theory->RoomNo;}
                    if($theory->Starting_Time == '14:40:00')
                        {$x[$i*9 + 8] = $theory->RoomNo;}
                }
            }
        }

        return $x;
    }

    public function labRoomList($labs, $x, $days){
        foreach($labs as $lab){
            for($i=0; $i<6; $i++){
                if($lab->Day == $days[$i]){
                    if($lab->Starting_Time == '08:00:00'){
                        $x[$i*9 + 0] = $lab->RoomNo;
                        $x[$i*9 + 1] = $lab->RoomNo;
                        $x[$i*9 + 2] = $lab->RoomNo;
                    }

                    if($lab->Starting_Time == '10:30:00'){
                        $x[$i*9 + 3] = $lab->RoomNo;
                        $x[$i*9 + 4] = $lab->RoomNo;
                        $x[$i*9 + 5] = $lab->RoomNo;
                    }

                    if($lab->Starting_Time == '13:00:00'){
                        $x[$i*9 + 6] = $lab->RoomNo;
                        $x[$i*9 + 7] = $lab->RoomNo;
                        $x[$i*9 + 8] = $lab->RoomNo;
                    }
                }
            }
        }

        return $x;
    }

    public function theorySemesterStudentGroup($theories, $x, $days){
        foreach($theories as $theory){
            for($i=0; $i<6; $i++){
                if($theory->Day == $days[$i]){
                    if($theory->Starting_Time == '08:00:00')
                        {$x[$i*9 + 0] = $theory->ysID.'('.$theory->Section.')';}
                    if($theory->Starting_Time == '08:50:00')
                        {$x[$i*9 + 1] = $theory->ysID.'('.$theory->Section.')';}
                    if($theory->Starting_Time == '09:40:00')
                        {$x[$i*9 + 2] = $theory->ysID.'('.$theory->Section.')';}
                    if($theory->Starting_Time == '10:30:00')
                        {$x[$i*9 + 3] = $theory->ysID.'('.$theory->Section.')';}
                    if($theory->Starting_Time == '11:20:00')
                        {$x[$i*9 + 4] = $theory->ysID.'('.$theory->Section.')';}
                    if($theory->Starting_Time == '12:10:00')
                        {$x[$i*9 + 5] = $theory->ysID.'('.$theory->Section.')';}
                    if($theory->Starting_Time == '13:00:00')
                        {$x[$i*9 + 6] = $theory->ysID.'('.$theory->Section.')';}
                    if($theory->Starting_Time == '13:50:00')
                        {$x[$i*9 + 7] = $theory->ysID.'('.$theory->Section.')';}
                    if($theory->Starting_Time == '14:40:00')
                        {$x[$i*9 + 8] = $theory->ysID.'('.$theory->Section.')';}
                }
            }
        }

   //      for($i=0; $i<54; $i++) {
	 	// 	print_r($x[$i].' ');
	 	// 	if(($i+1)%9 == 0) {
	 	// 		print_r('<br>');
	 	// 	}
	 	// }

        return $x;
    }

    public function labSemesterStudentGroup($labs, $x, $days){
        foreach($labs as $lab){
            for($i=0; $i<6; $i++){
                if($lab->Day == $days[$i]){
                    if($lab->Starting_Time == '08:00:00'){
                        if($lab->StudentGroup != 3) {
                        	$x[$i*9 + 0] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
	                        $x[$i*9 + 1] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
	                        $x[$i*9 + 2] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
                        }
                        else if($lab->StudentGroup == 3) {
                        	$x[$i*9 + 0] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
	                        $x[$i*9 + 1] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
	                        $x[$i*9 + 2] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
                        }
                    }

                    if($lab->Starting_Time == '10:30:00'){
                        if($lab->StudentGroup != 3) {
                        	$x[$i*9 + 3] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
	                        $x[$i*9 + 4] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
	                        $x[$i*9 + 5] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
                        }
                        else if($lab->StudentGroup == 3) {
                        	$x[$i*9 + 3] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
	                        $x[$i*9 + 4] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
	                        $x[$i*9 + 5] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
                        }
                    }

                    if($lab->Starting_Time == '13:00:00'){
                        if($lab->StudentGroup != 3) {
                        	$x[$i*9 + 6] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
	                        $x[$i*9 + 7] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
	                        $x[$i*9 + 8] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
                        }
                        else if($lab->StudentGroup == 3) {
                        	$x[$i*9 + 6] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
	                        $x[$i*9 + 7] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
	                        $x[$i*9 + 8] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
                        }
                    }
                }
            }
        }

   //      for($i=0; $i<54; $i++) {
	 	// 	print_r($x[$i].' ');
	 	// 	if(($i+1)%9 == 0) {
	 	// 		print_r('<br>');
	 	// 	}
	 	// }

        return $x;
    }

    public function theoryObject($teacherID) {
    	//$routine = new Teacher_Routine;

    	$routine_Theory = Teacher_Routine::where('TeacherID', $teacherID)->where('CourseType', 'Theory')->get();

    	// foreach ($routine_Theory as $key => $routine) {
    	// 	print_r($routine->CourseNo.'<br>');
    	// }

    	return $routine_Theory;
    }

    public function labObject($teacherID) {
    	//$routine = new Teacher_Routine;

    	$routine_Lab = Teacher_Routine::where('TeacherID', $teacherID)->where('CourseType', 'Lab')->get();

    	return $routine_Lab;
    }

    public function teacherName($teacherID) {
    	$name = Teacher_Routine::select('TeacherName')->where('TeacherID', $teacherID)->distinct('TeacherName')->get();

    	// print_r($name[0]->TeacherName);

    	return $name[0]->TeacherName;
    }

    public function returnX() {
    	$x = [];

    	for ($i=0; $i <54 ; $i++) { 
    		$x[$i] = '0';
    	}

    	return $x;
    }

    public function returnDays() {
    	$days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];

    	return $days;
    }

    public function index($teacherID) {
    	$theory = $this->theoryObject($teacherID);
    	$lab = $this->labObject($teacherID);
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
        $theory_semester_studentgroup = $this->returnX();
        $lab_semester_studentgroup = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($theory, $x, $days);
	 	$y = $this->returnLab($lab, $y, $days);

        $course_list = $this->courseList($teacherID);
        $theory_room_list = $this->theoryRoomList($theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($lab, $lab_room_list, $days);

        $teacher_name = $this->teacherName($teacherID);

        $theory_semester_studentgroup = $this->theorySemesterStudentGroup($theory, $theory_semester_studentgroup, $days);
        $lab_semester_studentgroup = $this->labSemesterStudentGroup($lab, $lab_semester_studentgroup, $days);

        // for($i=0; $i<54; $i++) {
        //     print_r($x[$i].' ');
        //     if(($i+1) % 9 == 0) print_r('<br>');
        // }

   //      $credit_hour = $this->creditHour(42, 'B');

	 	return view('Teacher.teacher', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'days', 'teacher_name', 'theory_semester_studentgroup', 'lab_semester_studentgroup'));


    	// return view('Teacher.teacher', compact('teacherID'));
    }

}
