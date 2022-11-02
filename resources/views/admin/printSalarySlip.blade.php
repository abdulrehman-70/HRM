@extends('layouts.applayout')
@section('content')
<div class="main-panel">
    <div class="content-wrapper">
      <div class="d-xl-flex justify-content-between align-items-start">
        <h2 class="text-dark font-weight-bold mb-2">Salary Slip</h2>
        <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">

              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton1">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
            <ul class="nav nav-tabs tab-transparent" role="tablist">
              <li class="nav-item">
                <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Generate Salary Slip</a>
              </li>
              <li>
              </li>
            </ul>
            <div class="d-md-block d-none">
          </div>
      </div>
      <div class="mt-3">
      @if(Session::get('success'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
              {{Session::get('success')}}
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
      @endif
    </div>
  {{-- @if(Auth::user()->hasRole('admin'))

      <div class="mt-4">
              <a href="/admin/add"> <button type="submit" class="btn btn-primary mr-2" style="background-color:
                  rgb(32, 185, 58);border:1px solid  rgb(32, 185, 58) ">Add User</button>
              </a>
          </div>
  @endif --}}
          <div class="tab-content tab-transparent-content">
            <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
              <div class="row">
                <div  class="col-12 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body" id = "salary_slip" style="color:black">
                       <div class="text-center">
                         <h3>CODART TECHNOLOGIES</h3>
                         <h4>18H DHA Phase1, 1st Floor Lahore</h4>
                         <h5>Salary Slip</h5>
                       </div>
                       <div >
                          <h6>Employee Name: {{ucwords($user->name)}}</h6>
                          <h6>Designation:  {{ucwords($user->designation)}}</h6>
                          <h6>Date: {{ $user->created_at->format('d M') }}</h6>
                       </div>
                       <table class="table mt-5">
                        <thead>
                            {{-- <tr>
                              <th scope="col"><b>Account Number</b></th>
                              <th scope="col"></th>
                              <th scope="col"><b>030313131313113</b></th>
                              <th scope="col"></th>
                              <th scope="col"></th>
                              <th scope="col"></th>
                          </tr> --}}
                          <tr>
                              <th scope="col"><b>Earnings</b></th>
                              <th scope="col"><b>Amount</b></th>
                              <th scope="col"><b>Deduction</b></th>
                              <th scope="col"><b>Amount</b></th>
                            </tr>
                        </thead>
                          <tbody>
                          <tr>
                              <td>Basic</td>
                              <td>{{$user->salary}}</span></td>
                              <td>Provident Fund</td>
                              <td>{{$salarySlip->provident_fund}}</td>
                          </tr>
                          <tr>
                              <td>Incentive Pay </td>
                              <td>{{$salarySlip->incentive}}</td>
                              <td>Professional Tax</td>
                              <td><span id="professional_tax_t">{{$salarySlip->professional_tax}}</span></td>
                          </tr>
                          <tr>
                              <td>House Rent</td>
                              <td>{{$salarySlip->house_rent}}</td>
                              <td>Loan</td>
                              <td>{{$salarySlip->loan}}</td>
                          </tr>
                          <tr>
                              <td>Meal Allowance</td>
                              <td>{{$salarySlip->meal_allowance}}</td>
                              <td>Total Deduction</b></td>
                              <td>0</td>

                          </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                            <tr>
                                <td><b>Total Earnings</b></td>
                                <td><b>{{$user->salary + $salarySlip->meal_allowance}}</b></td>
                                <td></td>
                                <td></td>
                            </tr>
                          <tr>
                            <td></td>
                            <td></td>
                              <td><b>Net Pay</b></td>
                              <td><b>{{$user->salary + $salarySlip->meal_allowance}}</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                      <form class="forms-sample" method="POST" action="/salary/slip/generate" enctype="multipart/form-data">
                        @csrf
                    </form>
                    <button type="button" class="btn btn-primary download w-25 ml-5 mb-5" style="background-color:
                    rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230)" data-id="salary_slip" >Print</button>
                    </div>
                  </div>
             </div>
            </div>
        </div>
    </div>



@endsection

@section('js')

{{-- <script>
document.getElementById("user_from_list").value="Select Employee";


function incentiveValue(){
 let incentive = document.getElementById("incentive").value;
  document.getElementById("incentive_t").innerHTML=incentive;
}
function houseRentValue(){
 let houseRent = document.getElementById("house_rent").value;
  document.getElementById("houseRent_t").innerHTML=houseRent;
}
function mealAllowanceValue(){
 let mealAllownace = document.getElementById("meal_allowance").value;
  document.getElementById("meal_allowance_t").innerHTML=mealAllownace;
}


function providentFundValue(){
 let providentFund = document.getElementById("provident_fund").value;
  document.getElementById("providentFund_t").innerHTML=providentFund;
}
function professionalTaxValue(){
 let professionalTax = document.getElementById("professional_tax").value;
  document.getElementById("professional_tax_t").innerHTML=professionalTax;
}
function loanValue(){
 let loan = document.getElementById("loan").value;
  document.getElementById("loan_t").innerHTML=loan;
}

function userValue(){
var e = document.getElementById("user_from_list").value;

} --}}


<script>
//screenshot code

$(document).ready(function(){
       $(".download").click(function(){
		   console.log(this.dataset.message)
		   console.log(this.dataset.id)
		   screenshot('salary_slip');
	   });
   });

   function screenshot(id){
    console.log('csadasda',id)
	   html2canvas(document.getElementById(id)).then(function(canvas){
          downloadImage(canvas.toDataURL(),id+"_downlaod.png");
	   });
   }

   function downloadImage(uri, filename){
	 var link = document.createElement('a');
	 if(typeof link.download !== 'string'){
        window.open(uri);
	 }
	 else{
		 link.href = uri;
		 link.download = filename;
		 accountForFirefox(clickLink, link);
	 }
   }

   function clickLink(link){
	   link.click();
   }

   function accountForFirefox(click){
	   var link = arguments[1];
	   document.body.appendChild(link);
	   click(link);
	   document.body.removeChild(link);
   }






</script>

@endsection
