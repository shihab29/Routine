<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department_Routine;

class theoryRoomController extends Controller
{
    public function returnTheory($theories, $x, $days){
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

	 	// for($i=0; $i<54; $i++) {
	 	// 	print_r($x[$i].' ');

	 	// 	if(($i+1)%9 == 0){
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
                        $x[$i*3 + 0] = $lab->CourseNo;
                    }

                    if($lab->Starting_Time == '10:30:00'){
                        $x[$i*3 + 1] = $lab->CourseNo;
                    }

                    if($lab->Starting_Time == '13:00:00'){
                        $x[$i*3 + 2] = $lab->CourseNo;
                    }
                }
            }
        }

        // for($i=0; $i<18; $i++) {
        //     print_r($x[$i].' ');
        //     if(($i+1)%3==0) {
        //         print_r('<br>');
        //     }
        // }

        return $x;
    }

    public function theoryObject($roomNo) {
    	//$routine = new Department_Routine;

    	$routine_Theory = Department_Routine::where('RoomNo', $roomNo)->get();

    	// foreach ($routine_Theory as $key => $theory) {
    	// 	print_r($key.' '.$theory->CourseNo.'<br>');
    	// }
     //    print_r('<br><br>');
    	return $routine_Theory;
    }

    public function labObject($roomNo) {
        //$routine = new Department_Routine;

        $routine_Lab = Department_Routine::where('RoomNo', $roomNo)->get();

        return $routine_Lab;
    }

    public function SemesterAndSection($roomNo, $y, $days) {
        $semesterAndSection = Department_Routine::where('RoomNo', $roomNo)->get();

        // foreach($semesterAndSection as $x){
        //     print_r($x->ysID.' '.$x->Section.' '.$x->StudentGroup.'<br>');
        // }

        foreach($semesterAndSection as $lab){
            for($i=0; $i<6; $i++){
                if($lab->Day == $days[$i]){
                    if($lab->Starting_Time == '08:00:00'){
                        if($lab->StudentGroup != 3) {
                            $y[$i*3 + 0] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
                        }else {
                            $y[$i*3 + 0] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
                        }
                    }

                    if($lab->Starting_Time == '10:30:00'){
                        if($lab->StudentGroup != 3) {
                            $y[$i*3 + 1] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
                        }else {
                            $y[$i*3 + 1] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
                        }
                    }

                    if($lab->Starting_Time == '13:00:00'){
                        if($lab->StudentGroup != 3) {
                            $y[$i*3 + 2] = $lab->ysID.'('.$lab->Section.$lab->StudentGroup.')';
                        }else {
                            $y[$i*3 + 2] = $lab->ysID.'('.$lab->Section.'1/'.$lab->Section.'2)';
                        }
                    }
                }
            }
        }

        // for($i=0; $i<18; $i++) {
        //     print_r($y[$i].' ');
        //     if(($i+1)%3==0){
        //         print_r('<br>');
        //     }
        // }

        return $y;
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

    public function theoryRoomFuntion($roomNo) {
    	$routine_42A_Theory = $this->theoryObject($roomNo);
    	//$routine_42A_Lab = $this->labObject(42, 'A');
    	$x = $this->returnX();
        $y = $this->returnX();
        // $theory_room_list = $this->returnX();
        // $lab_room_list = $this->returnX();
    	$days = $this->returnDays();

	 	$x = $this->returnTheory($routine_42A_Theory, $x, $days);
	 	//$y = $this->returnLab($routine_42A_Lab, $y, $days);

         // $course_list = $this->returnX();
    //     $theory_room_list = $this->theoryRoomList($routine_42A_Theory, $theory_room_list, $days);
    //     $lab_room_list = $this->labRoomList($routine_42A_Lab, $lab_room_list, $days);

    //     $credit_hour = $this->creditHour(42, 'A');

    //     // for($i=0; $i < 54; $i++) {
    //     //     print_r($lab_room_list[$i].' ');
    //     //     if(($i+1)%9 == 0) {
    //     //         print_r('<br>');
    //     //     }
    //     // }
    //     // print_r('<br>');
    //     // print_r('<br>');
    //     // print_r('<br>');
    //     // for($i=0; $i < 54; $i++) {
    //     //     print_r($y[$i].' ');
    //     //     if(($i+1)%9 == 0) {
    //     //         print_r('<br>');
    //     //     }
    //     // }

    //     // print_r($days[0]);
	 	 return view('Rooms.theoryRoom', compact('x', 'days', 'roomNo'));
    }

    public function labRoomFuntion($roomNo) {
        $routine_42A_Lab = $this->labObject($roomNo);
        $x = $this->returnX();
        $y = $this->returnX();
        $days = $this->returnDays();

        $x = $this->returnLab($routine_42A_Lab, $x, $days);
        $semesterAndSection = $this->SemesterAndSection($roomNo, $y, $days);

        return view('Rooms.labRoom', compact('x', 'days', 'roomNo', 'semesterAndSection'));
    }
}
