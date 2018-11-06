<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Forth_Second_A;
use App\Forth_Second_B;
use App\Department_Routine;

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
	 					$x[$i*9 + 0] = $lab->CourseNo.'(Lab)';
	 					$x[$i*9 + 1] = $lab->CourseNo.'(Lab)';
	 					$x[$i*9 + 2] = $lab->CourseNo.'(Lab)';
	 				}

	 				if($lab->Starting_Time == '10:30:00'){
	 					$x[$i*9 + 3] = $lab->CourseNo.'(Lab)';
	 					$x[$i*9 + 4] = $lab->CourseNo.'(Lab)';
	 					$x[$i*9 + 5] = $lab->CourseNo.'(Lab)';
	 				}

	 				if($lab->Starting_Time == '13:00:00'){
	 					$x[$i*9 + 6] = $lab->CourseNo.'(Lab)';
	 					$x[$i*9 + 7] = $lab->CourseNo.'(Lab)';
	 					$x[$i*9 + 8] = $lab->CourseNo.'(Lab)';
	 				}
	 			}
	 		}
	 	}

	 	return $x;
    }

    public function theoryObject($ysID, $section) {
    	$routine = new Department_Routine;

    	$routine_Theory = Department_Routine::where('ysID', $ysID)->where('Section', $section)->where('CourseType', 'Theory')->get();

    	return $routine_Theory;
    }

    public function labObject($ysID, $section) {
    	$routine = new Department_Routine;

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

    public function fourTwoA() {
    	$routine_42A_Theory = $this->theoryObject(42, 'A');
    	$routine_42A_Lab = $this->labObject(42, 'A');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_42A_Theory, $x, $days);
	 	$x = $this->returnLab($routine_42A_Lab, $x, $days);

	 	return view('42A', compact('x'));
    }

    public function fourTwoB() {
    	$routine_42B_Theory = $this->theoryObject(42, 'B');
    	$routine_42B_Lab = $this->labObject(42, 'B');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_42B_Theory, $x, $days);
	 	$x = $this->returnLab($routine_42B_Lab, $x, $days);

	 	return view('42B', compact('x'));
    }

    public function fourOneA() {
    	$routine_41A_Theory = $this->theoryObject(41, 'A');
    	$routine_41A_Lab = $this->labObject(41, 'A');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_41A_Theory, $x, $days);
	 	$x = $this->returnLab($routine_41A_Lab, $x, $days);

	 	return view('41A', compact('x'));
    }

    public function fourOneB() {
    	$routine_41B_Theory = $this->theoryObject(41, 'B');
    	$routine_41B_Lab = $this->labObject(41, 'B');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_41B_Theory, $x, $days);
	 	$x = $this->returnLab($routine_41B_Lab, $x, $days);

	 	return view('41B', compact('x'));
    }

    public function fourOneC() {
    	$routine_41C_Theory = $this->theoryObject(41, 'C');
    	$routine_41C_Lab = $this->labObject(41, 'C');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_41C_Theory, $x, $days);
	 	$x = $this->returnLab($routine_41C_Lab, $x, $days);

	 	return view('41C', compact('x'));
    }

    public function threeTwoA() {
    	$routine_32A_Theory = $this->theoryObject(32, 'A');
    	$routine_32A_Lab = $this->labObject(32, 'A');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_32A_Theory, $x, $days);
	 	$x = $this->returnLab($routine_32A_Lab, $x, $days);

	 	return view('32A', compact('x'));
    }

    public function threeTwoB() {
    	$routine_32B_Theory = $this->theoryObject(32, 'B');
    	$routine_32B_Lab = $this->labObject(32, 'B');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_32B_Theory, $x, $days);
	 	$x = $this->returnLab($routine_32B_Lab, $x, $days);

	 	return view('32B', compact('x'));
    }

    public function threeOneA() {
    	$routine_31A_Theory = $this->theoryObject(31, 'A');
    	$routine_31A_Lab = $this->labObject(31, 'A');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_31A_Theory, $x, $days);
	 	$x = $this->returnLab($routine_31A_Lab, $x, $days);

	 	return view('31A', compact('x'));
    }

    public function threeOneB() {
    	$routine_31B_Theory = $this->theoryObject(31, 'B');
    	$routine_31B_Lab = $this->labObject(31, 'B');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_31B_Theory, $x, $days);
	 	$x = $this->returnLab($routine_31B_Lab, $x, $days);

	 	return view('31B', compact('x'));
    }

    public function threeOneC() {
    	$routine_31C_Theory = $this->theoryObject(31, 'C');
    	$routine_31C_Lab = $this->labObject(31, 'C');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_31C_Theory, $x, $days);
	 	// for($i=0; $i<54; $i++){
	 	// 	print_r($x[$i].' ');
	 	// 	if(($i+1)%9==0)print_r('<br>');
	 	// }

	 	// foreach($routine_31C_Theory as $theory){
	 	//  	print_r($theory->CourseNo.'<br>');
	 	//  } 

	 	//  print_r('<br><br>');
	 	$x = $this->returnLab($routine_31C_Lab, $x, $days);

	 	 // foreach($routine_31C_Lab as $lab){
	 	 // 	print_r($lab->CourseNo.'<br>');
	 	 // }

	 	

	 	return view('31C', compact('x'));
    }

    public function twoTwoA() {
    	$routine_22A_Theory = $this->theoryObject(22, 'A');
    	$routine_22A_Lab = $this->labObject(22, 'A');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_22A_Theory, $x, $days);
	 	$x = $this->returnLab($routine_22A_Lab, $x, $days);

	 	return view('22A', compact('x'));
    }

    public function twoTwoB() {
    	$routine_22B_Theory = $this->theoryObject(22, 'B');
    	$routine_22B_Lab = $this->labObject(22, 'B');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_22B_Theory, $x, $days);
	 	$x = $this->returnLab($routine_22B_Lab, $x, $days);

	 	return view('22B', compact('x'));
    }

    public function twoOneA() {
    	$routine_21A_Theory = $this->theoryObject(21, 'A');
    	$routine_21A_Lab = $this->labObject(21, 'A');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_21A_Theory, $x, $days);
	 	$x = $this->returnLab($routine_21A_Lab, $x, $days);

	 	return view('21A', compact('x'));
    }

    public function twoOneB() {
    	$routine_21B_Theory = $this->theoryObject(21, 'B');
    	$routine_21B_Lab = $this->labObject(21, 'B');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_21B_Theory, $x, $days);
	 	$x = $this->returnLab($routine_21B_Lab, $x, $days);

	 	return view('21B', compact('x'));
    }

    public function twoOneC() {
    	$routine_21C_Theory = $this->theoryObject(21, 'C');
    	$routine_21C_Lab = $this->labObject(21, 'C');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_21C_Theory, $x, $days);
	 	$x = $this->returnLab($routine_21C_Lab, $x, $days);

	 	return view('21C', compact('x'));
    }

    public function oneTwoA() {
    	$routine_12A_Theory = $this->theoryObject(12, 'A');
    	$routine_12A_Lab = $this->labObject(12, 'A');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_12A_Theory, $x, $days);
	 	$x = $this->returnLab($routine_12A_Lab, $x, $days);

	 	return view('12A', compact('x'));
    }

    public function oneTwoB() {
    	$routine_12B_Theory = $this->theoryObject(12, 'B');
    	$routine_12B_Lab = $this->labObject(12, 'B');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_12B_Theory, $x, $days);
	 	$x = $this->returnLab($routine_12B_Lab, $x, $days);

	 	return view('12B', compact('x'));
    }

    public function oneOneA() {
    	$routine_11A_Theory = $this->theoryObject(11, 'A');
    	$routine_11A_Lab = $this->labObject(11, 'A');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_11A_Theory, $x, $days);
	 	$x = $this->returnLab($routine_11A_Lab, $x, $days);

	 	return view('11A', compact('x'));
    }

    public function oneOneB() {
    	$routine_11B_Theory = $this->theoryObject(11, 'B');
    	$routine_11B_Lab = $this->labObject(11, 'B');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_11B_Theory, $x, $days);
	 	$x = $this->returnLab($routine_11B_Lab, $x, $days);

	 	return view('11B', compact('x'));
    }

    public function oneOneC() {
    	$routine_11C_Theory = $this->theoryObject(11, 'C');
    	$routine_11C_Lab = $this->labObject(11, 'C');
    	$x = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_11C_Theory, $x, $days);
	 	$x = $this->returnLab($routine_11C_Lab, $x, $days);

	 	return view('11C', compact('x'));
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
}
