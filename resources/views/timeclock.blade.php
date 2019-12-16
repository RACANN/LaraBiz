@extends('layouts.master')
@section('content')
    <div id="timeclock">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Employee Time Clock
                </p>
            </header>
            <p>@{{status_code}}</p>
            <div class="card-content">
                <div class="content">
                    <input class="input" type="text" placeholder="Enter Employee Number" v-model="employee_number">
                </div>
               <div class="control has-text-centered">
                   <button class="button is-primary is-rounded" @Click="getEmployeeData">Enter</button>
               </div>
            </div>
            <footer class="card-footer" id="timeclockButtons">
                <div id="clock-in" class="button card-footer-item is-outlined is-primary timeclock-button" :disabled="!enableClockIn">Clock In</div>
                <div id="break-start" class="button card-footer-item is-outlined is-primary timeclock-button" :disabled="!enableBreakStart">Break Start</div>
                <div id="break-end" class="button card-footer-item is-outlined is-primary timeclock-button" :disabled="!enableBreakEnd">Break End</div>
                <div id="clock out" class="button card-footer-item is-outlined is-primary timeclock-button" :disabled="!enableClockOut">Clock Out</div>
            </footer>
        </div>
    </div>

@endsection
@section('custom-js')
    <script>
        var app = new Vue({
            el: '#timeclock',
            data: {
                employee_number: '',
                status_code: '',
                enableClockIn: false,
                enableBreakStart: false,
                enableBreakEnd: false,
                enableClockOut: false
            },
            methods: {
                getEmployeeData: function(){
                    $.ajax({
                        url: '/timeclock/check/'+this.employee_number,
                        method: "GET"
                    }).done(data => {
                        this.status_code = data.status.code;
                        this.toggleButtons();
                        console.log(this.enableClockIn);
                    })
                },
                toggleButtons: function () {
                    console.log(this.status_code);
                    switch (this.status_code){
                        case 1:
                            alert('Employee does not esist');
                            break;
                        case 2:
                            this.enableClockIn = true;
                            this.enableBreakStart = false;
                            this.enableBreakEnd = false;
                            this.enableClockOut = false;
                            break;
                        case 3:
                            this.enableClockIn = false;
                            this.enableBreakStart = true;
                            this.enableBreakEnd = true;
                            this.enableClockOut = true;
                            break;
                        case 4:
                            this.enableClockIn = false;
                            this.enableBreakStart = false;
                            this.enableClockOut = false;
                            this.enableBreakEnd = true;
                            break;
                        case 5:
                            this.enableClockIn = false;
                            this.enableBreakStart = false;
                            this.enableBreakEnd = false;
                            this.enableClockOut = true;
                            break;
                    }
                }
            },
            mounted(){

            }
        })
    </script>
@endsection