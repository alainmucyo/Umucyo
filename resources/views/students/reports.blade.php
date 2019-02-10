<!DOCTYPE html>
<html>
<head>
    <title></title>
    @include("material")
</head>
<body style="background-color: white;">
<div class="containe-fluid" style="margin-top: 4%;background-color: white !important;font-size: 13px;">
    @foreach($students as $student)
      <div class="card border " style="background-color: white !important;">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        REPUBLIC OF RWANDA <br>
                        MINISTRY OF EDUCATION <br>
                        UMUCYO School Management
                    </div>
                    <div class="float-right col-md-4">
                        ACADEMIC YEAR: <b>{{ \App\Period::get()->first()->year }}</b> <br>
                        LEVEL: <b>{{ $student->level->name }}</b> <br>
                        CLASS: <b> {{ $student->room->class }}</b><br>
                        NAMES: <b>{{ $student->fname }}</b>
                        @php
                            $sum_quiz=0;
              $sum_exam=0;
              $sum_total=0;
                              $term=0;
                              $id=$student->id;
                              if (\App\Period::get()->first()->term==1){
                                  $term="First Term";
                              }
                              else if (\App\Period::get()->first()->term==2){
                              $term="Second Term";
                              }
                              else{
                              $term="Third Term";
                              }
                        @endphp
                    </div>
                </div>
                <div class="text-center">
                   <h5 style="margin-left: 30%">Student Academic Report</h5>
                    <table class="table table-bordered table-sm page-break">
                        <tr>
                            <th rowspan="2">COURSES</th>
                            <th colspan="3">Maximum</th>
                            <th colspan="3">{{ $term }}</th>

                        </tr>
                        <tr>

                            <th>CAT</th>
                            <th>EX</th>
                            <th>TOT</th>
                            <th>CAT</th>
                            <th>EX</th>
                            <th>TOT</th>
                        </tr>
                        @foreach($student->room->lessons as $lesson)
                            @php
                                $total=$lesson->marks->where("student_id",$id)->pluck("total")->sum();
                                $totals=$lesson->totals->where("student_id",$id)->pluck("total")->sum();

                                $marks=0;
                                $exam=0;
                            if ($total==0){
                                $marks=0;
                            }
                            else{
                            $marks=round($lesson->hours*10*$lesson->marks->where("student_id",$id)->pluck("marks")->sum()/$total,2);
                            $sum_quiz +=$marks;
                            }
                            if ($totals==0){
                            $exam=0;
                            }
                            else{
                            $exam=round($lesson->hours*10*$lesson->totals->where("student_id",$id)->pluck("marks")->sum()/$totals,2);
                            $sum_exam +=$exam;
                            }
                            $term=round(($marks+$exam),2);
                            $sum_total +=$lesson->hours*10;
                            @endphp
                            <tr>

                                <td>{{ $lesson->name }}</td>
                                <th>{{ $lesson->hours*10 }}</th>
                                <th>{{ $lesson->hours*10 }}</th>
                                <th>{{ $lesson->hours*10*2 }}</th>
                                <td>{{ $marks }}</td>
                                <td>{{ $exam }}</td>
                                <td>{{ $term }}</td>
                            </tr>
                        @endforeach
                        <tr>

                            <th>Total</th>
                            <th>{{ $sum_total }}</th>
                            <th>{{ $sum_total }}</th>
                            <th>{{ $sum_total*2 }}</th>
                            <td>{{ $sum_quiz }}</td>
                            <td>{{ $sum_exam }}</td>
                            <td>{{ $sum_quiz+$sum_exam }}</td>
                        </tr>
                        <tr>

                            <th>Percentage</th>

                            <td colspan="6"><b class="float-right">
                                    @if($sum_total*2==0)
                                        {{ round(100*($sum_quiz+$sum_exam),2) }}%
                                    @else
                                        {{ round(100*($sum_quiz+$sum_exam)/($sum_total*2),2) }}%
                                    @endif
                                </b>
                            </td>
                        </tr>
                        <tr>

                            <th>Position</th>

                            <td colspan="6"><b class="float-right"> {{ $i++ }} of {{ $student->room->students->count() }}</b></td>
                        </tr>
                        <tr>
                            <td colspan="7" style="border-bottom-color: white;border-right-color: white;border-left-color: white;"> <small class="float-right text-muted" style="font-size: 7px">Generated By Umucyo School Management</small></td>
                        </tr>
                        
                    </table>
                   
                </div>
            </div>
        </div><br>
    @endforeach
</div>
</body>
<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
<script type="text/javascript">
    $(function () {
        // alert($("#quiz").attr("total"));
    });
</script>
</html>