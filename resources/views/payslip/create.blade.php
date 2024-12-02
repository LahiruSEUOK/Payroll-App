@extends('layouts.master')

@section('content')

<section class="section">
    <div class="section-header">
        <h1>Create Payslip</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Components</a></div>
            <div class="breadcrumb-item">Payslip Data</div>
        </div>
    </div>

    <div class="section-body">
        <div class="row justify-content-center">
            <!-- Payslip Details Card -->
            <div class="col-md-8">
                <div class="card mx-auto" style="width: 100%;">
                    <div class="card-header">
                    <h5 class="mt-4" style="color: darkblue;">Enter Payslip Details</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('payslip.store') }}" method="POST" id="payslip-form">
                            @csrf

                            <!-- Employee Search Section -->
                            <div class="form-group">
                                <label>
                                <h6>    Employee No / Name </h6>
                                </label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="emp_search" name="emp_search" placeholder="Enter Employee No or Name" required>
                                    <div class="input-group-append">
                                        <button type="button" class="btn btn-dark" id="load-employee-btn">Load</button>
                                    </div>
                                </div>
                            </div>

                            <div class='form-row'>

                            <!-- EPF Eligibility -->
                                <div class="col-md-6">
                                <label>EPF</label>
                                <select class="form-control" id="emp_epf" name="emp_epf" required>
                                    <option value="">Select an option</option>
                                    <option value="1">Yes</option>
                                    <option value="0">No</option>
                                </select>
                                </div>


                                <div class="col-md-6">
                                    <label>Month</label>
                                    <input type="month" class="form-control" name="month" required>
                                </div>
                                </div>
                                <br>




                            <div class="form-row">

                            <div class="col-md-6">
                                <label>Employee No</label>
                                <input type="text" class="form-control" id="emp_no" name="emp_no" required readonly>
                            </div>

                            <div class="col-md-6">
                                <label>Employee Name</label>
                                <input type="text" class="form-control" id="emp_name" name="emp_name" required readonly>
                            </div>
                            </div>

                            

                            
                            <!-- Earnings Section -->
                            <h5 class="mt-4" style="color: darkblue;">Earnings</h5>
                            <div class="form-row">
                                <div class="col-md-3">
                                    <label>Basic Salary</label>
                                    <input type="number" class="form-control" id="basic_salary" name="basic_salary" required readonly>
                                </div>
                                <div class="col-md-3">
                                    <label>Attendance Incentive</label>
                                    <input type="number" class="form-control" id="attendance_incentive" name="attendance_incentive">
                                </div>
                                <div class="col-md-3">
                                    <label>Other Incentive</label>
                                    <input type="number" class="form-control" id="other_incentive" name="other_incentive">
                                </div>
                            
                            <br>
                            <div class="col-md-3">
                                <label>Before 8.35 AM Incentive</label>
                                <input type="number" class="form-control" name="before835Incentive">
                            </div>
                            </div>

                            {{-- <div class="form-group mt-3">
                                <label>Before 8.35 AM Incentive</label>
                                <select class="form-control" name="incentive_835am">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div> --}}

                            {{-- <div class="form-group">
                                <label>Total for PF</label>
                                <input type="number" class="form-control" name="">
                            </div> --}}

                            <!-- Overtime -->
                            <h5 class="mt-4" style="color: darkblue;">Overtime</h5>
                            <div class="form-row">

                            <div class="col-md-4">
                                    <label>OT Rate</label>
                                    <input type="any" class="form-control" name="ot_rate" >
                                    <br>
                                </div>
                              
                                <div class="col-md-4">
                                    <label>Normal OT Hours</label>
                                    <input type="any" class="form-control" name="normal_ot_hours">
                                </div>

                                <div class="col-md-4">
                                    <label>Double OT Hours</label>
                                    <input type="any" class="form-control" name="double_ot_hours">
                                </div>
                            </div>

                              <!-- Deductions Section -->
<h5 class="mt-4" style="color: darkblue;">Deductions</h5>
<div class="form-row">
    <!-- <div class="col-md-6">
        <label>EPF</label>
        <input type="number" class="form-control" name="epf" readonly>
    </div> -->
    <div class="col-md-6">
        <label>Salary Advance</label> 
        <input type="number" class="form-control" name="salary_advance">
    </div>




    <div class="col-md-6">
        <label>
        <h7>Day Salary</h7> </label>  

         <div class="input-group">
    <!-- Read-only field -->
    <input type="text" class="form-control" id="cal_day" name="cal_day" placeholder="Click Calculate" readonly>
    
    <div class="input-group-append">
        <!-- Button that triggers the calculation -->
        <button type="button" class="note-btn btn btn-dark btn-sm" id="cal-day-sal">Calculate</button> 
    </div>
</div>










    </div>
</div>

                                


<br>
<h6>Informed Absent Days</h6>   
<div class="form-row">
    <div class="col-md-4">
        <label>Actual Days</label>
        <input type="number" class="form-control" name="informed_absent_days_count">
    </div>
    <div class="col-md-4">
        <label>Deducting Days</label>
        <input type="number" class="form-control" id="inf-ded-days" name="informed_absent_days">
    </div>
    <div class="col-md-4">
    <div class="input-group-append">
        <!-- Button that triggers the calculation -->
        <button type="button" class="note-btn btn btn-dark btn-sm" id="inf-abs-sal">Calculate Amount</button> 
    </div>
    <input type="text" class="form-control" id="inf-abs" name="informed_absent_days" placeholder="Click Calculate" readonly>
    
    </div>
</div>






<br>
<h6>Uninformed Absent Days</h6>
<div class="form-row">
    <div class="col-md-3">
        <label>Actual Days</label>
        <input type="number" class="form-control" name="uninformed_absent_days">
    </div>
    <div class="col-md-3">
        <label>Deducting Days</label>
        <input type="number" class="form-control" id="uinf-ded-days" name="uinformed_absent_days_count">
    </div>
    <div class="col-md-3">
        <label>Deducting Rate</label>
        <input type="number" class="form-control" id="deduct-rate" name="">
    </div>
    <div class="col-md-3">
    <div class="input-group-append">
        <!-- Button that triggers the calculation -->
        <button type="button" class="note-btn btn btn-dark btn-sm" id="uinf-abs-sal">Calculate Amount</button> 
    </div>
    <input type="text" class="form-control" id="uinf-abs" name="uinf-abs" placeholder="Click Calculate" readonly>
    
    </div>
</div>


<!-- <div class="form-row">
    <div class="col-md-6">
        <label>Uninformed Absent Days</label>
        <input type="number" class="form-control" name="uninformed_absent_days">
    </div>
    <div class="col-md-6">
        <label>Uninformed Absent Days Count</label>
        <input type="number" class="form-control" name="uninformed_absent_days_count">
    </div>
</div> -->

<br>
<h6>Late Attendance</h6>
<div class="form-row">
    <div class="col-md-6">
        <label> Deduction Amount</label>
        <input type="number" class="form-control" name="late_days">
    </div>
    <div class="col-md-6">
        <label> Days Count</label>
        <input type="number" class="form-control" name="late_attendance_days_count">
    </div>
</div>
<br>
<h6>Half Day Leaves</h6>
<div class="form-row"> 
    <div class="col-md-6">
        <label>Deduction Amount</label>
        <input type="number" class="form-control" name="half_day_leave_hours">
    </div>
    <div class="col-md-6">
        <label>Leaves Count</label>
        <input type="number" class="form-control" name="half_day_leaves_count">
    </div>
</div>
<div class="form-group">
    <label>Other Deductions</label>
    <input type="number" class="form-control" name="other_deductions" >
</div>


                            <!-- Summary Section -->
                            {{-- <h5 class="mt-4" style="color: darkblue;">Summary</h5>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Gross Earnings</label>
                                    <input type="number" class="form-control" name="gross_earnings">
                                </div>
                                <div class="col-md-6">
                                    <label>Balance Salary</label>
                                    <input type="number" class="form-control" name="balance_salary">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label>Employer's EPF Contribution</label>
                                    <input type="number" class="form-control" name="employer_epf_contribution">
                                </div>

                                <div class="col-md-6">
                                    <label>ETF</label>
                                    <input type="number" class="form-control" name="etf">
                                </div>






                                
                            </div>
                            <div class="form-group">
                                <label>Total Employer's Contribution</label>
                                <input type="number" class="form-control" name="total_employer_contribution">
                            </div> --}}

                            <div class="form-group mt-4 text-right">
                                <button type="submit" class="btn btn-primary">Create Payslip</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.getElementById('load-employee-btn').addEventListener('click', function () {
        const searchQuery = document.getElementById('emp_search').value.trim();
    
        if (searchQuery) {
            fetch(`/employee/search/${encodeURIComponent(searchQuery)}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Employee not found');
                    }
                    return response.json();
                })
                .then(data => {
                    // Populate fields with the employee data
                    document.getElementById('emp_no').value = data.emp_no;
                    document.getElementById('emp_name').value = data.emp_name;
                    document.getElementById('basic_salary').value = data.emp_base_salary;
    
                    // Ensure inputs are editable
                    document.getElementById('emp_no').removeAttribute('readonly');
                    document.getElementById('emp_name').removeAttribute('readonly');
                    document.getElementById('basic_salary').removeAttribute('readonly');
                })
                .catch(error => {
                    alert(error.message || 'Error occurred.');
                });
        } else {
            alert('Please enter Employee No or Name.');
        }
    });

</script>

<script>
    // Function to calculate the salary
    function calculateSalary() {
        // Get values from the respective input fields
        const basicSalary = parseFloat(document.getElementById('basic_salary').value) || 0;
        const attendanceIncentive = parseFloat(document.getElementById('attendance_incentive').value) || 0;
        const otherIncentive = parseFloat(document.getElementById('other_incentive').value) || 0;

        // Perform the calculation
        const total = (basicSalary + attendanceIncentive + otherIncentive)/25;

        // Set the calculated total in the 'cal_day' input field
        document.getElementById('cal_day').value = total.toFixed(2);
    }

    // Add an event listener to the Calculate button
    document.getElementById('cal-day-sal').addEventListener('click', calculateSalary);
</script>
<script>
    // Function to calculate informed abseant days deduction
    function calculateinfdayssal() {
        // Get values from the respective input fields
        const deductingdays = parseFloat(document.getElementById('inf-ded-days').value) || 0;
        const daysal = parseFloat(document.getElementById('cal_day').value) || 0;


        // Perform the calculation
        const total = deductingdays * daysal;

        // Set the calculated total in the 'inf-day' input field
        document.getElementById('inf-abs').value = total.toFixed(2);
    }

    // Add an event listener to the Calculate button
    document.getElementById('inf-abs-sal').addEventListener('click', calculateinfdayssal);
</script>
<script>
    // Function to calculate the uninformed days deducting
    function calculateuinfdayssal() {
        // Get values from the respective input fields
        const deductingdays = parseFloat(document.getElementById('uinf-ded-days').value) || 0;
        const daysal = parseFloat(document.getElementById('cal_day').value) || 0;
        const dedrate = parseFloat(document.getElementById('deduct-rate').value) || 0;


        // Perform the calculation
        const total = deductingdays * daysal * dedrate;

        // Set the calculated total in the 'cinf-day' input field
        document.getElementById('uinf-abs').value = total.toFixed(2);
    }

    // Add an event listener to the Calculate button
    document.getElementById('uinf-abs-sal').addEventListener('click', calculateuinfdayssal);
</script>


@endsection
