@extends('layouts.minimal')
@section('content')
    <div id="timeclock">
        <div class="card">
            <header class="card-header">
                <p class="card-header-title">
                    Employee Time Clock
                </p>
            </header>
            <p>@{{status_message}}</p>
            <div class="card-content">
                <div class="content">
                    <input class="input" type="text" placeholder="Enter Employee Number" onkeypress="return event.charCode >= 48 && event.charCode <= 57" v-model="employee_number">
                </div>
               <div class="control has-text-centered">
                   <button class="button is-primary is-rounded" @Click="getEmployeeData">Enter</button>
               </div>
            </div>
            <footer class="card-footer" id="timeclockButtons">
                <div id="clock-in" class="button card-footer-item is-outlined is-primary timeclock-button" :disabled="!enableClockIn" @click="clockIn">Clock In</div>
                <div id="break-start" class="button card-footer-item is-outlined is-primary timeclock-button" :disabled="!enableBreakStart" @click="startBreak">Break Start</div>
                <div id="break-end" class="button card-footer-item is-outlined is-primary timeclock-button" :disabled="!enableBreakEnd" @click="endBreak">Break End</div>
                <div id="clock out" class="button card-footer-item is-outlined is-primary timeclock-button" :disabled="!enableClockOut" @click="clockOut">Clock Out</div>
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
                status_message: '',
                enableClockIn: false,
                enableBreakStart: false,
                enableBreakEnd: false,
                enableClockOut: false
            },
            methods: {
                getEmployeeData: function(){
                    $.ajax({
                        url: '/timeclock/check/'+this.employee_number,
                        method: "POST",
                        data: {
                            "_token" : "{{csrf_token()}}"
                        }
                    }).done(data =>  {
                        this.status_code = data.status.code;
                        this.status_message = data.status.description;
                        this.toggleButtons();
                        console.log(this.enableClockIn);
                    })
                },
                toggleButtons: function () {
                    console.log(this.status_code);
                    switch (this.status_code){
                        case 1:
                            Swal.fire('Employee does not esist');
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
                            this.enableBreakEnd = false;
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
                },
                clockIn: function() {
                    $.ajax({
                        url: '/shifts/',
                        method: "POST",
                        data : {
                            "_token" : "{{csrf_token()}}",
                            "origin" : "timeclock",
                            "employee_number" : this.employee_number
                        }
                    })
                },
                startBreak: function() {
                    $.ajax({
                        url: '/timeclock/break/start/',
                        method: "POST",
                        data : {
                            "_token" : "{{csrf_token()}}",
                            "employee_number" : this.employee_number
                        }
                    })
                },
                endBreak: function() {
                    $.ajax({
                        url: '/timeclock/break/end/',
                        method: "POST",
                        data : {
                            "_token" : "{{csrf_token()}}",
                            "employee_number" : this.employee_number
                        }
                    })
                },
                clockOut: function() {
                    $.ajax({
                        url: '/timeclock/clockout/',
                        method: "POST",
                        data : {
                            "_token" : "{{csrf_token()}}",
                            "employee_number" : this.employee_number
                        }
                    })
                }

            },
            mounted(){

            }
        })
    </script>
@endsection