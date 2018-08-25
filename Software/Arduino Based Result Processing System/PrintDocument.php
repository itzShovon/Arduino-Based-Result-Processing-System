<?php
    session_start();
    include('Data/PHP/PrintDocumentConnect.php');
    echo "<script type='text/javascript'>alert('Use Ctrl+P for printing...');</script>";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Arduino Based Result Processing System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <style>
        @page {
            size: A4
        }

    </style>
    
    <?php if($format == 'course'){ ?>
        <title><?php echo "Course: " . $course; ?></title>
    <?php }else{ ?>
        <title><?php echo "Roll: " . $student_id; ?></title>
    <?php } ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="Data/Images/Icon/PrintDocument.png" type="image/gif" sizes="16x16">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="Data/CSS/bootstrap.min.css">
    <link rel="stylesheet" href="Data/CSS/AdminHome.css">
    <script src="Data/JQuery/jquery.min.js"></script>
    <script src="Data/JS/bootstrap.min.js"></script>
</head>

<body class="A4">
    <div class="container page">
        <section class="sheet padding-10mm">
            <table class="table" style="border: none;">
                <thead>
                    <tr>
                        <?php if($format == 'course'){ ?>
                        <th colspan="4"><h3 style="text-transform: uppercase; text-align: center; border: none;">Marks Sheet(Course wise)</h3></th>
                        <?php }else if($format == 'student'){ ?>
                        <th colspan="4"><h3 style="text-transform: uppercase; text-align: center; border: none;">Marks Sheet(Student wise)</h3></th>
                        <?php } ?>
                    </tr>
                    <tr>
                        <?php if($format == 'course'){ ?>
                            <th style="text-transform: uppercase; border: none;">Course code: <?php echo "$course"; ?></th>
                            <th colspan="2" style="border: none;">Course Title: <?php echo "$course_title"; ?></th>
                        <?php } ?>
                        <?php if($format == 'student'){ ?>
                            <th style="border: none;">Roll: <?php echo "$student_id"; ?></th>
                            <th colspan="2" style="border: none;">Name: <?php echo "$student_name"; ?></th>
                            <th rowspan="4" style="border: none; text-align: right; width: 20%;">
                                <?php foreach($student_list as $row){ ?>
                                    <?php if($row->student_id == $student_id){ ?>
                                        <img src="Data/Images/Store/<?php echo $row->student_picture; ?>" class="img-rounded" alt="Student Picture" height="150">
                                <?php }} ?>
                            </th>
                        <?php } ?>
                    </tr>
                    <tr>
                        <th style="border: none;">Semester: Even</th>
                        <th style="border: none;">Year: 4th</th>
                        <th style="border: none;">Session: 2013-14</th>
                    </tr>
                    <tr>
                        <th colspan="3" style="border: none;">Department: Computer Science and Engineering</th>
                    </tr>
                    <tr>
                        <th colspan="3" style="border: none;">Institute: University of Rajshahi</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
            
            
            <?php if($format == 'course'){ ?>
            <?php $page = 0; $line = 0; ?>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Attendance</th>
                        <th>Class Test</th>
                        <th>Part A</th>
                        <th>Part B</th>
                        <th>Total</th>
                        <th>GPA</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($student_list as $row1){ ?>
                        <?php foreach($cse as $row2){ ?>
                            <?php if($row1->student_id == $row2->student_id){ ?>
                            <?php $line = $line + 1; ?>
                            <?php if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                    $line = 0;
                                    $page = $page + 1;
                                    echo "</tbody>";
                                echo "</table>";
                            echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                            echo "</section>";
                            echo "<section class='sheet padding-10mm'>";
                            echo "<table class='table table-bordered'>";
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>Roll</th>";
                                        echo "<th>Name</th>";
                                        echo "<th>Attendance</th>";
                                        echo "<th>Class Test</th>";
                                        echo "<th>Part A</th>";
                                        echo "<th>Part B</th>";
                                        echo "<th>Total</th>";
                                        echo "<th>GPA</th>";
                                        echo "<th>Grade</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                            }?>
                                <tr>
                                    <?php
                                        $student_name = $row1->student_name;
                                        $student_id = $row1->student_id;
                                        $student_attaindance = $row2->student_attaindance;
                                        $class_test_marks = $row2->class_test_marks;
                                        $part_a_marks = $row2->part_a_marks;
                                        $part_b_marks = $row2->part_b_marks;

                                        foreach($course_list as $row){
                                            if($row->course_code == $course){
                                                if($student_attaindance > 35)
                                                    $student_attaindance = 35;

                                                $credit = $row->course_credit;

                                                if($credit == 1){
                                                    $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                                    $gpa = ($marks * 4 / 25);
                                                }
                                                else if($credit == 2){
                                                    $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                                    $gpa = ($marks * 4 / 50);
                                                }
                                                else if($credit == 3){
                                                    $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                                    $gpa = ($marks * 4 / 75);
                                                }

                                                if($gpa < 2)
                                                    $grade = 'F';
                                                else if($gpa < 2.25)
                                                    $grade = 'D';
                                                else if($gpa < 2.5)
                                                    $grade = 'C';
                                                else if($gpa < 2.75)
                                                    $grade = 'C+';
                                                else if($gpa < 3)
                                                    $grade = 'B-';
                                                else if($gpa < 3.25)
                                                    $grade = 'B';
                                                else if($gpa < 3.5)
                                                    $grade = 'B+';
                                                else if($gpa < 3.75)
                                                    $grade = 'A-';
                                                else if($gpa < 4)
                                                    $grade = 'A';
                                                else
                                                    $grade = 'A+';
                                            }
                                        }
                                    ?>
                                    <td><?php echo "$student_id"; ?></td>
                                    <td><?php echo "$student_name"; ?></td>
                                    <td><?php echo "$student_attaindance"; ?></td>
                                    <td><?php echo "$class_test_marks"; ?></td>
                                    <td><?php echo "$part_a_marks"; ?></td>
                                    <td><?php echo "$part_b_marks"; ?></td>
                                    <td><?php echo round("$marks", 2); ?></td>
                                    <td><?php echo round("$gpa", 2); ?></td>
                                    <td><?php echo "$grade"; ?></td>
                                </tr>
                                
                    <?php }}} ?>
                </tbody>
            </table>
            
            
            <table class="table ending_footer" style="margin-top:<?php $gap = 13 - $line; $gapX = $gap * 65; echo $gapX ?>px">
                <thead>
                    <tr>
                        <th style="text-align: left;">Signature of First Tabulator</th>
                        <th style="text-align: right;">Signature of Second Tabulator</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="text-align: left;"></td>
                        <td style="text-align: right;"></td>
                    </tr>
                </tbody>
            </table>
            
            
            
            <?php $page++; echo "<p style='margin-top: 60px;'>Page No. $page</p>"; ?>
        <?php } ?>
            
            
            
            
            <?php if($format == 'student'){ ?>
            <?php $page = 0; $line = 0; ?>
            
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Code</th>
                        <th>Title</th>
                        <th>Attendance</th>
                        <th>Test</th>
                        <th>Part A</th>
                        <th>Part B</th>
                        <th>Total</th>
                        <th>GPA</th>
                        <th>Grade</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($course_list as $row1){ ?>
                    <?php

                        $course_code = $row1->course_code;
                        $course_title = $row1->course_title;
                        $credit = $row1->course_credit;

                        if($course_code == 'cse4211'){
                            foreach($cse4211 as $row2){
                                if($row2->student_id == $student_id){
                                    $line ++;
                                    
                                    if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                        $line = 0;
                                        $page = $page + 1;
                                        echo "</tbody>";
                                    echo "</table>";
                                echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                                echo "</section>";
                                echo "<section class='sheet padding-10mm'>";
                                echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Code</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Attendance</th>";
                                            echo "<th>Class Test</th>";
                                            echo "<th>Part A</th>";
                                            echo "<th>Part B</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>GPA</th>";
                                            echo "<th>Grade</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    }

                                    $student_attaindance = $row2->student_attaindance;
                                    $class_test_marks = $row2->class_test_marks;
                                    $part_b_marks = $row2->part_b_marks;
                                    $part_a_marks = $row2->part_a_marks;
                                    if($student_attaindance > 35)
                                        $student_attaindance = 35;

                                    $credit = $row1->course_credit;

                                    if($credit == 1){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                        $gpa = ($marks * 4 / 25);
                                    }
                                    else if($credit == 2){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                        $gpa = ($marks * 4 / 50);
                                    }
                                    else if($credit == 3){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                        $gpa = ($marks * 4 / 75);
                                    }

                                    if($gpa < 2)
                                        $grade = 'F';
                                    else if($gpa < 2.25)
                                        $grade = 'D';
                                    else if($gpa < 2.5)
                                        $grade = 'C';
                                    else if($gpa < 2.75)
                                        $grade = 'C+';
                                    else if($gpa < 3)
                                        $grade = 'B-';
                                    else if($gpa < 3.25)
                                        $grade = 'B';
                                    else if($gpa < 3.5)
                                        $grade = 'B+';
                                    else if($gpa < 3.75)
                                        $grade = 'A-';
                                    else if($gpa < 4)
                                        $grade = 'A';
                                    else
                                        $grade = 'A+';


                                    echo "<tr>";
                                        echo "<td style='text-transform: uppercase;'>$course_code</td>";
                                        echo "<td>$course_title</td>";
                                        echo "<td>$student_attaindance</td>";
                                        echo "<td>$class_test_marks</td>";
                                        echo "<td>$part_a_marks</td>";
                                        echo "<td>$part_b_marks</td>";
                                        echo "<td>" . round($marks, 2) . "</td>";
                                        echo "<td>" . round($gpa, 2) . "</td>";
                                        echo "<td>$grade</td>";
                                    echo "</tr>";
                                    
                            
                                }}
                        }
                        else if($course_code == 'cse4212'){
                            foreach($cse4212 as $row2){
                                if($row2->student_id == $student_id){
                                    $line ++;
                                    
                                    if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                        $line = 0;
                                        $page = $page + 1;
                                        echo "</tbody>";
                                    echo "</table>";
                                echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                                echo "</section>";
                                echo "<section class='sheet padding-10mm'>";
                                echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Code</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Attendance</th>";
                                            echo "<th>Class Test</th>";
                                            echo "<th>Part A</th>";
                                            echo "<th>Part B</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>GPA</th>";
                                            echo "<th>Grade</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    }
                                    
                                    



                                    $student_attaindance = $row2->student_attaindance;
                                    $class_test_marks = $row2->class_test_marks;
                                    $part_b_marks = $row2->part_b_marks;
                                    $part_a_marks = $row2->part_a_marks;
                                    if($student_attaindance > 35)
                                        $student_attaindance = 35;

                                    $credit = $row1->course_credit;

                                    if($credit == 1){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                        $gpa = ($marks * 4 / 25);
                                    }
                                    else if($credit == 2){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                        $gpa = ($marks * 4 / 50);
                                    }
                                    else if($credit == 3){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                        $gpa = ($marks * 4 / 75);
                                    }

                                    if($gpa < 2)
                                        $grade = 'F';
                                    else if($gpa < 2.25)
                                        $grade = 'D';
                                    else if($gpa < 2.5)
                                        $grade = 'C';
                                    else if($gpa < 2.75)
                                        $grade = 'C+';
                                    else if($gpa < 3)
                                        $grade = 'B-';
                                    else if($gpa < 3.25)
                                        $grade = 'B';
                                    else if($gpa < 3.5)
                                        $grade = 'B+';
                                    else if($gpa < 3.75)
                                        $grade = 'A-';
                                    else if($gpa < 4)
                                        $grade = 'A';
                                    else
                                        $grade = 'A+';


                                    echo "<tr>";
                                        echo "<td style='text-transform: uppercase;'>$course_code</td>";
                                        echo "<td>$course_title</td>";
                                        echo "<td>$student_attaindance</td>";
                                        echo "<td>$class_test_marks</td>";
                                        echo "<td>$part_a_marks</td>";
                                        echo "<td>$part_b_marks</td>";
                                        echo "<td>" . round($marks, 2) . "</td>";
                                        echo "<td>" . round($gpa, 2) . "</td>";
                                        echo "<td>$grade</td>";
                                    echo "</tr>";
                                    
                                }
                            }
                        }
                        else if($course_code == 'cse4221'){
                            foreach($cse4221 as $row2){
                                if($row2->student_id == $student_id){
                                    $line ++;
                                    
                                    if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                        $line = 0;
                                        $page = $page + 1;
                                        echo "</tbody>";
                                    echo "</table>";
                                echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                                echo "</section>";
                                echo "<section class='sheet padding-10mm'>";
                                echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Code</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Attendance</th>";
                                            echo "<th>Class Test</th>";
                                            echo "<th>Part A</th>";
                                            echo "<th>Part B</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>GPA</th>";
                                            echo "<th>Grade</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    }



                                    $student_attaindance = $row2->student_attaindance;
                                    $class_test_marks = $row2->class_test_marks;
                                    $part_b_marks = $row2->part_b_marks;
                                    $part_a_marks = $row2->part_a_marks;
                                    if($student_attaindance > 35)
                                        $student_attaindance = 35;

                                    $credit = $row1->course_credit;

                                    if($credit == 1){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                        $gpa = ($marks * 4 / 25);
                                    }
                                    else if($credit == 2){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                        $gpa = ($marks * 4 / 50);
                                    }
                                    else if($credit == 3){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                        $gpa = ($marks * 4 / 75);
                                    }

                                    if($gpa < 2)
                                        $grade = 'F';
                                    else if($gpa < 2.25)
                                        $grade = 'D';
                                    else if($gpa < 2.5)
                                        $grade = 'C';
                                    else if($gpa < 2.75)
                                        $grade = 'C+';
                                    else if($gpa < 3)
                                        $grade = 'B-';
                                    else if($gpa < 3.25)
                                        $grade = 'B';
                                    else if($gpa < 3.5)
                                        $grade = 'B+';
                                    else if($gpa < 3.75)
                                        $grade = 'A-';
                                    else if($gpa < 4)
                                        $grade = 'A';
                                    else
                                        $grade = 'A+';


                                    echo "<tr>";
                                        echo "<td style='text-transform: uppercase;'>$course_code</td>";
                                        echo "<td>$course_title</td>";
                                        echo "<td>$student_attaindance</td>";
                                        echo "<td>$class_test_marks</td>";
                                        echo "<td>$part_a_marks</td>";
                                        echo "<td>$part_b_marks</td>";
                                        echo "<td>" . round($marks, 2) . "</td>";
                                        echo "<td>" . round($gpa, 2) . "</td>";
                                        echo "<td>$grade</td>";
                                    echo "</tr>";
                                    
                                }
                            }
                        }
                        else if($course_code == 'cse4222'){
                            foreach($cse4222 as $row2){
                                if($row2->student_id == $student_id){
                                    $line ++;
                                    
                                    if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                        $line = 0;
                                        $page = $page + 1;
                                        echo "</tbody>";
                                    echo "</table>";
                                echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                                echo "</section>";
                                echo "<section class='sheet padding-10mm'>";
                                echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Code</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Attendance</th>";
                                            echo "<th>Class Test</th>";
                                            echo "<th>Part A</th>";
                                            echo "<th>Part B</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>GPA</th>";
                                            echo "<th>Grade</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    }



                                    $student_attaindance = $row2->student_attaindance;
                                    $class_test_marks = $row2->class_test_marks;
                                    $part_b_marks = $row2->part_b_marks;
                                    $part_a_marks = $row2->part_a_marks;
                                    if($student_attaindance > 35)
                                        $student_attaindance = 35;

                                    $credit = $row1->course_credit;

                                    if($credit == 1){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                        $gpa = ($marks * 4 / 25);
                                    }
                                    else if($credit == 2){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                        $gpa = ($marks * 4 / 50);
                                    }
                                    else if($credit == 3){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                        $gpa = ($marks * 4 / 75);
                                    }

                                    if($gpa < 2)
                                        $grade = 'F';
                                    else if($gpa < 2.25)
                                        $grade = 'D';
                                    else if($gpa < 2.5)
                                        $grade = 'C';
                                    else if($gpa < 2.75)
                                        $grade = 'C+';
                                    else if($gpa < 3)
                                        $grade = 'B-';
                                    else if($gpa < 3.25)
                                        $grade = 'B';
                                    else if($gpa < 3.5)
                                        $grade = 'B+';
                                    else if($gpa < 3.75)
                                        $grade = 'A-';
                                    else if($gpa < 4)
                                        $grade = 'A';
                                    else
                                        $grade = 'A+';


                                    echo "<tr>";
                                        echo "<td style='text-transform: uppercase;'>$course_code</td>";
                                        echo "<td>$course_title</td>";
                                        echo "<td>$student_attaindance</td>";
                                        echo "<td>$class_test_marks</td>";
                                        echo "<td>$part_a_marks</td>";
                                        echo "<td>$part_b_marks</td>";
                                        echo "<td>" . round($marks, 2) . "</td>";
                                        echo "<td>" . round($gpa, 2) . "</td>";
                                        echo "<td>$grade</td>";
                                    echo "</tr>";
                                    
                                }
                            }
                        }
                        else if($course_code == 'cse4231'){
                            foreach($cse4231 as $row2){
                                if($row2->student_id == $student_id){
                                    $line ++;
                                    
                                    if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                        $line = 0;
                                        $page = $page + 1;
                                        echo "</tbody>";
                                    echo "</table>";
                                echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                                echo "</section>";
                                echo "<section class='sheet padding-10mm'>";
                                echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Code</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Attendance</th>";
                                            echo "<th>Class Test</th>";
                                            echo "<th>Part A</th>";
                                            echo "<th>Part B</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>GPA</th>";
                                            echo "<th>Grade</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    }



                                    $student_attaindance = $row2->student_attaindance;
                                    $class_test_marks = $row2->class_test_marks;
                                    $part_b_marks = $row2->part_b_marks;
                                    $part_a_marks = $row2->part_a_marks;
                                    if($student_attaindance > 35)
                                        $student_attaindance = 35;

                                    $credit = $row1->course_credit;

                                    if($credit == 1){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                        $gpa = ($marks * 4 / 25);
                                    }
                                    else if($credit == 2){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                        $gpa = ($marks * 4 / 50);
                                    }
                                    else if($credit == 3){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                        $gpa = ($marks * 4 / 75);
                                    }

                                    if($gpa < 2)
                                        $grade = 'F';
                                    else if($gpa < 2.25)
                                        $grade = 'D';
                                    else if($gpa < 2.5)
                                        $grade = 'C';
                                    else if($gpa < 2.75)
                                        $grade = 'C+';
                                    else if($gpa < 3)
                                        $grade = 'B-';
                                    else if($gpa < 3.25)
                                        $grade = 'B';
                                    else if($gpa < 3.5)
                                        $grade = 'B+';
                                    else if($gpa < 3.75)
                                        $grade = 'A-';
                                    else if($gpa < 4)
                                        $grade = 'A';
                                    else
                                        $grade = 'A+';


                                    echo "<tr>";
                                        echo "<td style='text-transform: uppercase;'>$course_code</td>";
                                        echo "<td>$course_title</td>";
                                        echo "<td>$student_attaindance</td>";
                                        echo "<td>$class_test_marks</td>";
                                        echo "<td>$part_a_marks</td>";
                                        echo "<td>$part_b_marks</td>";
                                        echo "<td>" . round($marks, 2) . "</td>";
                                        echo "<td>" . round($gpa, 2) . "</td>";
                                        echo "<td>$grade</td>";
                                    echo "</tr>";
                                    
                                }
                            }
                        }
                        else if($course_code == 'cse4232'){
                            foreach($cse4232 as $row2){
                                if($row2->student_id == $student_id){
                                    $line ++;
                                    
                                    if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                        $line = 0;
                                        $page = $page + 1;
                                        echo "</tbody>";
                                    echo "</table>";
                                echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                                echo "</section>";
                                echo "<section class='sheet padding-10mm'>";
                                echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Code</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Attendance</th>";
                                            echo "<th>Class Test</th>";
                                            echo "<th>Part A</th>";
                                            echo "<th>Part B</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>GPA</th>";
                                            echo "<th>Grade</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    }



                                    $student_attaindance = $row2->student_attaindance;
                                    $class_test_marks = $row2->class_test_marks;
                                    $part_b_marks = $row2->part_b_marks;
                                    $part_a_marks = $row2->part_a_marks;
                                    if($student_attaindance > 35)
                                        $student_attaindance = 35;

                                    $credit = $row1->course_credit;

                                    if($credit == 1){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                        $gpa = ($marks * 4 / 25);
                                    }
                                    else if($credit == 2){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                        $gpa = ($marks * 4 / 50);
                                    }
                                    else if($credit == 3){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                        $gpa = ($marks * 4 / 75);
                                    }

                                    if($gpa < 2)
                                        $grade = 'F';
                                    else if($gpa < 2.25)
                                        $grade = 'D';
                                    else if($gpa < 2.5)
                                        $grade = 'C';
                                    else if($gpa < 2.75)
                                        $grade = 'C+';
                                    else if($gpa < 3)
                                        $grade = 'B-';
                                    else if($gpa < 3.25)
                                        $grade = 'B';
                                    else if($gpa < 3.5)
                                        $grade = 'B+';
                                    else if($gpa < 3.75)
                                        $grade = 'A-';
                                    else if($gpa < 4)
                                        $grade = 'A';
                                    else
                                        $grade = 'A+';


                                    echo "<tr>";
                                        echo "<td style='text-transform: uppercase;'>$course_code</td>";
                                        echo "<td>$course_title</td>";
                                        echo "<td>$student_attaindance</td>";
                                        echo "<td>$class_test_marks</td>";
                                        echo "<td>$part_a_marks</td>";
                                        echo "<td>$part_b_marks</td>";
                                        echo "<td>" . round($marks, 2) . "</td>";
                                        echo "<td>" . round($gpa, 2) . "</td>";
                                        echo "<td>$grade</td>";
                                    echo "</tr>";
                                    
                                }
                            }
                        }
                        else if($course_code == 'cse4251'){
                            foreach($cse4251 as $row2){
                                if($row2->student_id == $student_id){
                                    $line ++;
                                    
                                    if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                        $line = 0;
                                        $page = $page + 1;
                                        echo "</tbody>";
                                    echo "</table>";
                                echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                                echo "</section>";
                                echo "<section class='sheet padding-10mm'>";
                                echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Code</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Attendance</th>";
                                            echo "<th>Class Test</th>";
                                            echo "<th>Part A</th>";
                                            echo "<th>Part B</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>GPA</th>";
                                            echo "<th>Grade</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    }



                                    $student_attaindance = $row2->student_attaindance;
                                    $class_test_marks = $row2->class_test_marks;
                                    $part_b_marks = $row2->part_b_marks;
                                    $part_a_marks = $row2->part_a_marks;
                                    if($student_attaindance > 35)
                                        $student_attaindance = 35;

                                    $credit = $row1->course_credit;

                                    if($credit == 1){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                        $gpa = ($marks * 4 / 25);
                                    }
                                    else if($credit == 2){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                        $gpa = ($marks * 4 / 50);
                                    }
                                    else if($credit == 3){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                        $gpa = ($marks * 4 / 75);
                                    }

                                    if($gpa < 2)
                                        $grade = 'F';
                                    else if($gpa < 2.25)
                                        $grade = 'D';
                                    else if($gpa < 2.5)
                                        $grade = 'C';
                                    else if($gpa < 2.75)
                                        $grade = 'C+';
                                    else if($gpa < 3)
                                        $grade = 'B-';
                                    else if($gpa < 3.25)
                                        $grade = 'B';
                                    else if($gpa < 3.5)
                                        $grade = 'B+';
                                    else if($gpa < 3.75)
                                        $grade = 'A-';
                                    else if($gpa < 4)
                                        $grade = 'A';
                                    else
                                        $grade = 'A+';


                                    echo "<tr>";
                                        echo "<td style='text-transform: uppercase;'>$course_code</td>";
                                        echo "<td>$course_title</td>";
                                        echo "<td>$student_attaindance</td>";
                                        echo "<td>$class_test_marks</td>";
                                        echo "<td>$part_a_marks</td>";
                                        echo "<td>$part_b_marks</td>";
                                        echo "<td>" . round($marks, 2) . "</td>";
                                        echo "<td>" . round($gpa, 2) . "</td>";
                                        echo "<td>$grade</td>";
                                    echo "</tr>";
                                    
                                }
                            }
                        }
                        else if($course_code == 'cse4252'){
                            foreach($cse4252 as $row2){
                                if($row2->student_id == $student_id){
                                    $line ++;
                                    
                                    if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                        $line = 0;
                                        $page = $page + 1;
                                        echo "</tbody>";
                                    echo "</table>";
                                echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                                echo "</section>";
                                echo "<section class='sheet padding-10mm'>";
                                echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Code</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Attendance</th>";
                                            echo "<th>Class Test</th>";
                                            echo "<th>Part A</th>";
                                            echo "<th>Part B</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>GPA</th>";
                                            echo "<th>Grade</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    }



                                    $student_attaindance = $row2->student_attaindance;
                                    $class_test_marks = $row2->class_test_marks;
                                    $part_b_marks = $row2->part_b_marks;
                                    $part_a_marks = $row2->part_a_marks;
                                    if($student_attaindance > 35)
                                        $student_attaindance = 35;

                                    $credit = $row1->course_credit;

                                    if($credit == 1){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                        $gpa = ($marks * 4 / 25);
                                    }
                                    else if($credit == 2){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                        $gpa = ($marks * 4 / 50);
                                    }
                                    else if($credit == 3){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                        $gpa = ($marks * 4 / 75);
                                    }

                                    if($gpa < 2)
                                        $grade = 'F';
                                    else if($gpa < 2.25)
                                        $grade = 'D';
                                    else if($gpa < 2.5)
                                        $grade = 'C';
                                    else if($gpa < 2.75)
                                        $grade = 'C+';
                                    else if($gpa < 3)
                                        $grade = 'B-';
                                    else if($gpa < 3.25)
                                        $grade = 'B';
                                    else if($gpa < 3.5)
                                        $grade = 'B+';
                                    else if($gpa < 3.75)
                                        $grade = 'A-';
                                    else if($gpa < 4)
                                        $grade = 'A';
                                    else
                                        $grade = 'A+';


                                    echo "<tr>";
                                        echo "<td style='text-transform: uppercase;'>$course_code</td>";
                                        echo "<td>$course_title</td>";
                                        echo "<td>$student_attaindance</td>";
                                        echo "<td>$class_test_marks</td>";
                                        echo "<td>$part_a_marks</td>";
                                        echo "<td>$part_b_marks</td>";
                                        echo "<td>" . round($marks, 2) . "</td>";
                                        echo "<td>" . round($gpa, 2) . "</td>";
                                        echo "<td>$grade</td>";
                                    echo "</tr>";
                                    
                                }
                            }
                        }
                        else if($course_code == 'cse4280'){
                            foreach($cse4280 as $row2){
                                if($row2->student_id == $student_id){
                                    $line ++;
                                    
                                    if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                        $line = 0;
                                        $page = $page + 1;
                                        echo "</tbody>";
                                    echo "</table>";
                                echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                                echo "</section>";
                                echo "<section class='sheet padding-10mm'>";
                                echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Code</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Attendance</th>";
                                            echo "<th>Class Test</th>";
                                            echo "<th>Part A</th>";
                                            echo "<th>Part B</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>GPA</th>";
                                            echo "<th>Grade</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    }



                                    $student_attaindance = $row2->student_attaindance;
                                    $class_test_marks = $row2->class_test_marks;
                                    $part_b_marks = $row2->part_b_marks;
                                    $part_a_marks = $row2->part_a_marks;
                                    if($student_attaindance > 35)
                                        $student_attaindance = 35;

                                    $credit = $row1->course_credit;

                                    if($credit == 1){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                        $gpa = ($marks * 4 / 25);
                                    }
                                    else if($credit == 2){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                        $gpa = ($marks * 4 / 50);
                                    }
                                    else if($credit == 3){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                        $gpa = ($marks * 4 / 75);
                                    }

                                    if($gpa < 2)
                                        $grade = 'F';
                                    else if($gpa < 2.25)
                                        $grade = 'D';
                                    else if($gpa < 2.5)
                                        $grade = 'C';
                                    else if($gpa < 2.75)
                                        $grade = 'C+';
                                    else if($gpa < 3)
                                        $grade = 'B-';
                                    else if($gpa < 3.25)
                                        $grade = 'B';
                                    else if($gpa < 3.5)
                                        $grade = 'B+';
                                    else if($gpa < 3.75)
                                        $grade = 'A-';
                                    else if($gpa < 4)
                                        $grade = 'A';
                                    else
                                        $grade = 'A+';


                                    echo "<tr>";
                                        echo "<td style='text-transform: uppercase;'>$course_code</td>";
                                        echo "<td>$course_title</td>";
                                        echo "<td>$student_attaindance</td>";
                                        echo "<td>$class_test_marks</td>";
                                        echo "<td>$part_a_marks</td>";
                                        echo "<td>$part_b_marks</td>";
                                        echo "<td>" . round($marks, 2) . "</td>";
                                        echo "<td>" . round($gpa, 2) . "</td>";
                                        echo "<td>$grade</td>";
                                    echo "</tr>";
                                    
                                }
                            }
                        }
                        else if($course_code == 'cse4292'){
                            foreach($cse4292 as $row2){
                                if($row2->student_id == $student_id){
                                    $line ++;
                                    
                                    if((($line > 9) && ($page == 0)) || ($line > 12) && ($page > 0)){
                                        $line = 0;
                                        $page = $page + 1;
                                        echo "</tbody>";
                                    echo "</table>";
                                echo "<p style='margin-top: 60px;'>Page No. $page</p>";
                                echo "</section>";
                                echo "<section class='sheet padding-10mm'>";
                                echo "<table class='table table-bordered'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>Code</th>";
                                            echo "<th>Title</th>";
                                            echo "<th>Attendance</th>";
                                            echo "<th>Class Test</th>";
                                            echo "<th>Part A</th>";
                                            echo "<th>Part B</th>";
                                            echo "<th>Total</th>";
                                            echo "<th>GPA</th>";
                                            echo "<th>Grade</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                    }



                                    $student_attaindance = $row2->student_attaindance;
                                    $class_test_marks = $row2->class_test_marks;
                                    $part_b_marks = $row2->part_b_marks;
                                    $part_a_marks = $row2->part_a_marks;
                                    if($student_attaindance > 35)
                                        $student_attaindance = 35;

                                    $credit = $row1->course_credit;

                                    if($credit == 1){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 5) + ($student_attaindance / 35 * 2.5);
                                        $gpa = ($marks * 4 / 25);
                                    }
                                    else if($credit == 2){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 10) + ($student_attaindance / 35 * 5);
                                        $gpa = ($marks * 4 / 50);
                                    }
                                    else if($credit == 3){
                                        $marks = ($part_a_marks + $part_b_marks) + ($class_test_marks / 30 * 15) + ($student_attaindance / 35 * 7.5);
                                        $gpa = ($marks * 4 / 75);
                                    }

                                    if($gpa < 2)
                                        $grade = 'F';
                                    else if($gpa < 2.25)
                                        $grade = 'D';
                                    else if($gpa < 2.5)
                                        $grade = 'C';
                                    else if($gpa < 2.75)
                                        $grade = 'C+';
                                    else if($gpa < 3)
                                        $grade = 'B-';
                                    else if($gpa < 3.25)
                                        $grade = 'B';
                                    else if($gpa < 3.5)
                                        $grade = 'B+';
                                    else if($gpa < 3.75)
                                        $grade = 'A-';
                                    else if($gpa < 4)
                                        $grade = 'A';
                                    else
                                        $grade = 'A+';


                                    echo "<tr>";
                                        echo "<td style='text-transform: uppercase;'>$course_code</td>";
                                        echo "<td>$course_title</td>";
                                        echo "<td>$student_attaindance</td>";
                                        echo "<td>$class_test_marks</td>";
                                        echo "<td>$part_a_marks</td>";
                                        echo "<td>$part_b_marks</td>";
                                        echo "<td>" . round($marks, 2) . "</td>";
                                        echo "<td>" . round($gpa, 2) . "</td>";
                                        echo "<td>$grade</td>";
                                    echo "</tr>";
                                }
                            }
                        }
                    ?>
                    <?php } ?>
                </tbody>
            </table>
            
            
            
                <?php if($page > 0){ ?>
                    <table class="table ending_footer" style="margin-top:<?php $gap = 12 - $line; $gapX = $gap * 65; echo $gapX ?>px">
                        <thead>
                            <tr>
                                <th style="text-align: left;">Signature of First Tabulator</th>
                                <th style="text-align: right;">Signature of Second Tabulator</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: left;"></td>
                                <td style="text-align: right;"></td>
                            </tr>
                        </tbody>
                    </table>
                <?php }else{ ?>
                    <table class="table ending_footer">
                        <thead>
                            <tr>
                                <th style="text-align: left;">Signature of First Tabulator</th>
                                <th style="text-align: right;">Signature of Second Tabulator</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style="text-align: left;"></td>
                                <td style="text-align: right;"></td>
                            </tr>
                        </tbody>
                    </table>
                <?php } ?>



                <?php $page++; echo "<p style='margin-top: 60px;'>Page No. $page</p>"; ?>
            <?php } ?>
            
        </section>
    </div>

</body>

</html>