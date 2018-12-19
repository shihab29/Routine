<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Forth_Second_A;
use App\Forth_Second_B;
use App\Department_Routine;
use App\Teacher_Routine;

class pageController extends Controller
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

	 	return $x;
    }

    public function returnLab($labs, $x, $days){
    	foreach($labs as $lab){
	 		for($i=0; $i<6; $i++){
	 			if($lab->Day == $days[$i]){
	 				if($lab->Starting_Time == '08:00:00'){
                        if($lab->StudentGroup != 3) {
                            $x[$i*9 + 0] = $lab->CourseNo.' ('.$lab->Section.$lab->StudentGroup.')';
                            $x[$i*9 + 1] = $lab->CourseNo.' ('.$lab->Section.$lab->StudentGroup.')';
                            $x[$i*9 + 2] = $lab->CourseNo.' ('.$lab->Section.$lab->StudentGroup.')';
                        }
                        else if($lab->StudentGroup == 3) {
                            $x[$i*9 + 0] = $lab->CourseNo.' ('.$lab->Section.'1/'.$lab->Section.'2)';
                            $x[$i*9 + 1] = $lab->CourseNo.' ('.$lab->Section.'1/'.$lab->Section.'2)';
                            $x[$i*9 + 2] = $lab->CourseNo.' ('.$lab->Section.'1/'.$lab->Section.'2)';
                        }
                    }

                    if($lab->Starting_Time == '10:30:00'){
                        if($lab->StudentGroup != 3) {
                            $x[$i*9 + 3] = $lab->CourseNo.' ('.$lab->Section.$lab->StudentGroup.')';
                            $x[$i*9 + 4] = $lab->CourseNo.' ('.$lab->Section.$lab->StudentGroup.')';
                            $x[$i*9 + 5] = $lab->CourseNo.' ('.$lab->Section.$lab->StudentGroup.')';
                        }
                        else if($lab->StudentGroup == 3) {
                            $x[$i*9 + 3] = $lab->CourseNo.' ('.$lab->Section.'1/'.$lab->Section.'2)';
                            $x[$i*9 + 4] = $lab->CourseNo.' ('.$lab->Section.'1/'.$lab->Section.'2)';
                            $x[$i*9 + 5] = $lab->CourseNo.' ('.$lab->Section.'1/'.$lab->Section.'2)';
                        }
                    }

                    if($lab->Starting_Time == '13:00:00'){
                        if($lab->StudentGroup != 3) {
                            $x[$i*9 + 6] = $lab->CourseNo.' ('.$lab->Section.$lab->StudentGroup.')';
                            $x[$i*9 + 7] = $lab->CourseNo.' ('.$lab->Section.$lab->StudentGroup.')';
                            $x[$i*9 + 8] = $lab->CourseNo.' ('.$lab->Section.$lab->StudentGroup.')';
                        }
                        else if($lab->StudentGroup == 3) {
                            $x[$i*9 + 6] = $lab->CourseNo.' ('.$lab->Section.'1/'.$lab->Section.'2)';
                            $x[$i*9 + 7] = $lab->CourseNo.' ('.$lab->Section.'1/'.$lab->Section.'2)';
                            $x[$i*9 + 8] = $lab->CourseNo.' ('.$lab->Section.'1/'.$lab->Section.'2)';
                        }
                    }
	 			}
	 		}
	 	}

	 	return $x;
    }

    public function theoryObject($ysID, $section) {
    	//$routine = new Department_Routine;

    	$routine_Theory = Department_Routine::where('ysID', $ysID)->where('Section', $section)->where('CourseType', 'Theory')->get();

    	return $routine_Theory;
    }

    public function labObject($ysID, $section) {
    	//$routine = new Department_Routine;

    	$routine_Lab = Department_Routine::where('ysID', $ysID)->where('Section', $section)->where('CourseType', 'Lab')->get();

    	return $routine_Lab;
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

    public function courseList($ysID, $section) {
        $lists;
        $lists = Department_Routine::select('CourseNo', 'CourseTitle', 'StudentGroup', 'CourseType')->where('ysID', $ysID)->where('Section', $section)->where('StudentGroup', '<>', 2)->distinct('CourseNo')->get();

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

    public function creditHour($ysID, $section) {
        $course_list = Department_Routine::select('CourseNo', 'CourseType', 'StudentGroup')->where('ysID', $ysID)->where('Section', $section)->distinct('CourseNo')->get();

        $course_credit;

        // print_r(sizeof($course_list));

        for($i=0; $i < sizeof($course_list); $i++) {
            $course_credit['courseNo'][$i] = $course_list[$i]->CourseNo;
            if($course_list[$i]->CourseType == 'Theory') {
                $course_credit['courseHour'][$i] = '3';
            }
            else {
                 if($course_list[$i]->StudentGroup == 3) {
                    $course_credit['courseHour'][$i] = '0.75';
                 }
                 else {
                    $course_credit['courseHour'][$i] = '1.5';
                 }
            }
        }

        // for($i=0; $i < sizeof($course_list); $i++) {
        //     print_r($course_credit['courseNo'][$i].' '.$course_credit['courseHour'][$i].'<br>');
        // }

        return $course_credit;
        
    }

    public function totalTeacherHour() {
        $teacher_hour = Teacher_Routine::select('duration')->get();
        $sum = 0;

        foreach($teacher_hour as $hour) {
            $sum = $sum + $hour->duration;
        }

        return $sum;
    }

    public function totalStudentHour() {
        $student_hour = Department_Routine::select('duration')->get();
        $sum = 0;

        foreach($student_hour as $hour) {
            $sum = $sum + $hour->duration;
        }

        return $sum;
    }

    public function fourTwoA() {
    	$routine_42A_Theory = $this->theoryObject(42, 'A');
    	$routine_42A_Lab = $this->labObject(42, 'A');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_42A_Theory, $x, $days);
	 	$y = $this->returnLab($routine_42A_Lab, $y, $days);

        $course_list = $this->courseList(42, 'A');
        $theory_room_list = $this->theoryRoomList($routine_42A_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_42A_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(42, 'A');

        // for($i=0; $i < 54; $i++) {
        //     print_r($lab_room_list[$i].' ');
        //     if(($i+1)%9 == 0) {
        //         print_r('<br>');
        //     }
        // }
        // print_r('<br>');
        // print_r('<br>');
        // print_r('<br>');
        // for($i=0; $i < 54; $i++) {
        //     print_r($y[$i].' ');
        //     if(($i+1)%9 == 0) {
        //         print_r('<br>');
        //     }
        // }

        // print_r($days[0]);
	 	 return view('42A', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function fourTwoB() {
    	$routine_42B_Theory = $this->theoryObject(42, 'B');
    	$routine_42B_Lab = $this->labObject(42, 'B');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_42B_Theory, $x, $days);
	 	$y = $this->returnLab($routine_42B_Lab, $y, $days);

        $course_list = $this->courseList(42, 'B');
        $theory_room_list = $this->theoryRoomList($routine_42B_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_42B_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(42, 'B');

	 	return view('42B', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function fourOneA() {
    	$routine_41A_Theory = $this->theoryObject(41, 'A');
    	$routine_41A_Lab = $this->labObject(41, 'A');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_41A_Theory, $x, $days);
	 	$y = $this->returnLab($routine_41A_Lab, $y, $days);

        $course_list = $this->courseList(41, 'A');
        $theory_room_list = $this->theoryRoomList($routine_41A_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_41A_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(41, 'A');

	 	return view('41A', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function fourOneB() {
    	$routine_41B_Theory = $this->theoryObject(41, 'B');
    	$routine_41B_Lab = $this->labObject(41, 'B');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_41B_Theory, $x, $days);
	 	$y = $this->returnLab($routine_41B_Lab, $y, $days);

        $course_list = $this->courseList(41, 'B');
        $theory_room_list = $this->theoryRoomList($routine_41B_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_41B_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(41, 'B');

	 	return view('41B', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function fourOneC() {
    	$routine_41C_Theory = $this->theoryObject(41, 'C');
    	$routine_41C_Lab = $this->labObject(41, 'C');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_41C_Theory, $x, $days);
	 	$y = $this->returnLab($routine_41C_Lab, $y, $days);

        $course_list = $this->courseList(41, 'C');
        $theory_room_list = $this->theoryRoomList($routine_41C_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_41C_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(41, 'C');

	 	return view('41C', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function threeTwoA() {
    	$routine_32A_Theory = $this->theoryObject(32, 'A');
    	$routine_32A_Lab = $this->labObject(32, 'A');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_32A_Theory, $x, $days);
	 	$y = $this->returnLab($routine_32A_Lab, $y, $days);

        $course_list = $this->courseList(32, 'A');
        $theory_room_list = $this->theoryRoomList($routine_32A_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_32A_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(32, 'A');

	 	return view('32A', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function threeTwoB() {
    	$routine_32B_Theory = $this->theoryObject(32, 'B');
    	$routine_32B_Lab = $this->labObject(32, 'B');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_32B_Theory, $x, $days);
	 	$y = $this->returnLab($routine_32B_Lab, $y, $days);

        $course_list = $this->courseList(32, 'B');
        $theory_room_list = $this->theoryRoomList($routine_32B_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_32B_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(32, 'B');

	 	return view('32B', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function threeOneA() {
    	$routine_31A_Theory = $this->theoryObject(31, 'A');
    	$routine_31A_Lab = $this->labObject(31, 'A');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_31A_Theory, $x, $days);
	 	$y = $this->returnLab($routine_31A_Lab, $y, $days);

        $course_list = $this->courseList(31, 'A');
        $theory_room_list = $this->theoryRoomList($routine_31A_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_31A_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(31, 'A');

	 	return view('31A', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function threeOneB() {
    	$routine_31B_Theory = $this->theoryObject(31, 'B');
    	$routine_31B_Lab = $this->labObject(31, 'B');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_31B_Theory, $x, $days);
	 	$y = $this->returnLab($routine_31B_Lab, $y, $days);

        $course_list = $this->courseList(31, 'B');
        $theory_room_list = $this->theoryRoomList($routine_31B_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_31B_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(31, 'B');

	 	return view('31B', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function threeOneC() {
    	$routine_31C_Theory = $this->theoryObject(31, 'C');
    	$routine_31C_Lab = $this->labObject(31, 'C');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_31C_Theory, $x, $days);
	 	// for($i=0; $i<54; $i++){
	 	// 	print_ry$x[$i].' ');
	 	// 	if(($i+1)%9==0)print_r('<br>');
	 	// }

	 	// foreach($routine_31C_Theory as $theory){
	 	//  	print_r($theory->CourseNo.'<br>');
	 	//  } 

	 	//  print_r('<br><br>');
	 	$y = $this->returnLab($routine_31C_Lab, $y, $days);

	 	 // foreach($routine_31C_Lab as $lab){
	 	 // 	print_r($lab->CourseNo.'<br>');
	 	 // }

        $course_list = $this->courseList(31, 'C');
        $theory_room_list = $this->theoryRoomList($routine_31C_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_31C_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(31, 'C');

	 	

	 	return view('31C', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function twoTwoA() {
    	$routine_22A_Theory = $this->theoryObject(22, 'A');
    	$routine_22A_Lab = $this->labObject(22, 'A');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_22A_Theory, $x, $days);
	 	$y = $this->returnLab($routine_22A_Lab, $y, $days);

        $course_list = $this->courseList(22, 'A');
        $theory_room_list = $this->theoryRoomList($routine_22A_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_22A_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(22, 'A');

	 	return view('22A', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function twoTwoB() {
    	$routine_22B_Theory = $this->theoryObject(22, 'B');
    	$routine_22B_Lab = $this->labObject(22, 'B');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_22B_Theory, $x, $days);
	 	$y = $this->returnLab($routine_22B_Lab, $y, $days);

        $course_list = $this->courseList(22, 'B');
        $theory_room_list = $this->theoryRoomList($routine_22B_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_22B_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(22, 'B');

	 	return view('22B', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function twoOneA() {
    	$routine_21A_Theory = $this->theoryObject(21, 'A');
    	$routine_21A_Lab = $this->labObject(21, 'A');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_21A_Theory, $x, $days);
	 	$y = $this->returnLab($routine_21A_Lab, $y, $days);

        $course_list = $this->courseList(21, 'A');
        $theory_room_list = $this->theoryRoomList($routine_21A_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_21A_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(21, 'A');

	 	return view('21A', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function twoOneB() {
    	$routine_21B_Theory = $this->theoryObject(21, 'B');
    	$routine_21B_Lab = $this->labObject(21, 'B');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_21B_Theory, $x, $days);
	 	$y = $this->returnLab($routine_21B_Lab, $y, $days);

        $course_list = $this->courseList(21, 'B');
        $theory_room_list = $this->theoryRoomList($routine_21B_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_21B_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(21, 'B');

	 	return view('21B', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function twoOneC() {
    	$routine_21C_Theory = $this->theoryObject(21, 'C');
    	$routine_21C_Lab = $this->labObject(21, 'C');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_21C_Theory, $x, $days);
	 	$y = $this->returnLab($routine_21C_Lab, $y, $days);

        $course_list = $this->courseList(21, 'C');
        $theory_room_list = $this->theoryRoomList($routine_21C_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_21C_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(21, 'C');

	 	return view('21C', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function oneTwoA() {
    	$routine_12A_Theory = $this->theoryObject(12, 'A');
    	$routine_12A_Lab = $this->labObject(12, 'A');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_12A_Theory, $x, $days);
	 	$y = $this->returnLab($routine_12A_Lab, $y, $days);

        $course_list = $this->courseList(12, 'A');
        $theory_room_list = $this->theoryRoomList($routine_12A_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_12A_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(12, 'A');

	 	return view('12A', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function oneTwoB() {
    	$routine_12B_Theory = $this->theoryObject(12, 'B');
    	$routine_12B_Lab = $this->labObject(12, 'B');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_12B_Theory, $x, $days);
	 	$y = $this->returnLab($routine_12B_Lab, $y, $days);

        $course_list = $this->courseList(12, 'B');
        $theory_room_list = $this->theoryRoomList($routine_12B_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_12B_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(12, 'B');

	 	return view('12B', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function oneOneA() {
    	$routine_11A_Theory = $this->theoryObject(11, 'A');
    	$routine_11A_Lab = $this->labObject(11, 'A');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_11A_Theory, $x, $days);
	 	$y = $this->returnLab($routine_11A_Lab, $y, $days);

        $course_list = $this->courseList(11, 'A');
        $theory_room_list = $this->theoryRoomList($routine_11A_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_11A_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(11, 'A');

	 	return view('11A', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function oneOneB() {
    	$routine_11B_Theory = $this->theoryObject(11, 'B');
    	$routine_11B_Lab = $this->labObject(11, 'B');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_11B_Theory, $x, $days);
	 	$y = $this->returnLab($routine_11B_Lab, $y, $days);

        $course_list = $this->courseList(11, 'B');
        $theory_room_list = $this->theoryRoomList($routine_11B_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_11B_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(11, 'B');

	 	return view('11B', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }

    public function oneOneC() {
    	$routine_11C_Theory = $this->theoryObject(11, 'C');
    	$routine_11C_Lab = $this->labObject(11, 'C');
    	$x = $this->returnX();
        $y = $this->returnX();
        $theory_room_list = $this->returnX();
        $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_11C_Theory, $x, $days);
	 	$y = $this->returnLab($routine_11C_Lab, $y, $days);

        $course_list = $this->courseList(11, 'C');
        $theory_room_list = $this->theoryRoomList($routine_11C_Theory, $theory_room_list, $days);
        $lab_room_list = $this->labRoomList($routine_11C_Lab, $lab_room_list, $days);

        $credit_hour = $this->creditHour(11, 'C');

	 	return view('11C', compact('x', 'y', 'course_list', 'theory_room_list', 'lab_room_list', 'credit_hour', 'days'));
    }











    public function forthSecondA() {

    	$routine_42A = new Forth_Second_A;

    	$routine_42A_Theory = Forth_second_A::where('CourseType', 'Theory')->get();
    	$routine_42A_Lab = Forth_second_A::where('CourseType', 'Lab')->get();

    	$x = [];

    	for ($i=0; $i <54 ; $i++) { 
    		$x[$i] = '0';
    	}
    	$days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];

	 	$x = $this->returnTheory($routine_42A_Theory, $x, $days);
	 	$x = $this->returnLab($routine_42A_Lab, $x, $days);

    	return view('forthSecondA', compact('x'));
    }

    public function forthSecondB() {
    	$routine_42B = new Forth_Second_B;

    	$routine_42B_Theory = Forth_second_B::where('CourseType', 'Theory')->get();
    	$routine_42B_Lab = Forth_second_B::where('CourseType', 'Lab')->get();

    	$x = [];

    	for ($i=0; $i <54 ; $i++) { 
    		$x[$i] = '0';
    	}
    	$days = ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday'];

	 	$x = $this->returnTheory($routine_42B_Theory, $x, $days);
	 	$x = $this->returnLab($routine_42B_Lab, $x, $days);


    	return view('forthSecondB', compact('x'));

    	//return view('forthSecondB');
    }

    public function totalTime() {
        $total_teacher_hour = $this->totalTeacherHour();
        $total_student_hour = $this->totalStudentHour();

        return view('TotalTime.totalHour', compact('total_teacher_hour', 'total_student_hour'));
    }
}
