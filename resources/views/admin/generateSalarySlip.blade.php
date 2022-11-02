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
                <div class="col-5 grid-margin stretch-card">
                  <div class="card" id="capture">
                    <div class="card-body" style="color:black">
                        <form class="forms-sample" method="POST" action="/salary/slip/generate" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleSelectGender">Select Employee</label>
                                <select class="form-control" name="user" onchange="userValue()" id="user_from_list">
                                    <option selected="selected" id="defaulOptions">
                                        Select Employee
                                    </option>
                                    @foreach($users as $user)
                                    <option value="{{$user->id}}" id="options">
                                        {{$user->name}}
                                    </option>
                                    @endforeach
                                </select>
                               </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Incentive Pay</label>
                              <input type="text" name="incentive" value="{{old('incentive')}}" oninput="incentiveValue()"
                              maxlength="7" class="form-control" id="incentive" >
                              @error('incentive')
                              <span class="error" style="color:red">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">House Rent</label>
                              <input type="text" name="house_rent" value="{{old('house_rent')}}" oninput="houseRentValue()"
                              maxlength="7" class="form-control" id="house_rent" >
                              @error('house_rent')
                              <span class="error" style="color:red">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Meal Allowance</label>
                              <input type="text" name="meal_allowance" value="{{old('meal_allowance')}}" oninput="mealAllowanceValue()"
                              maxlength="7" class="form-control" id="meal_allowance" >
                              @error('meal_allowance')
                              <span class="error" style="color:red">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Provident Fund</label>
                              <input type="text" name="provident_fund" value="{{old('provident_fund')}}" oninput="providentFundValue()"
                              maxlength="7" class="form-control" id="provident_fund" >
                              @error('provident_fund')
                              <span class="error" style="color:red">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Professional Tax</label>
                              <input type="text" name="professional_text" value="{{old('professional_text')}}" oninput="professionalTaxValue()"
                              maxlength="7" class="form-control" id="professional_tax">
                              @error('professional_text')
                              <span class="error" style="color:red">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="form-group">
                                <label for="exampleInputName1">Loan</label>
                              <input type="text" name="loan" value="{{old('loan')}}" class="form-control" oninput="loanValue()" id="loan"
                               maxlength="7">
                               @error('loan')
                               <span class="error" style="color:red">{{ $message }}</span>
                               @enderror
                            </div>
                            <input type="hidden" id="user_id" name="user_id">
                            <button type="submit" class="btn btn-primary mr-2 download" style="background-color:
                            rgb(115, 193, 230);border:1px solid  rgb(115, 193, 230)" data-id="salary_slip" >Generate</button>
                        </form>
                    </div>
                  </div>
                </div>
                <div id = "salary_slip" class="col-7 grid-margin stretch-card">
                    <div class="card">
                      <div class="card-body" style="color:black">
                       <div class="text-center">
                         <h3>CODART TECHNOLOGIES</h3>
                         <h4>18H DHA Phase1, 1st Floor Lahore</h4>
                         <h5>Salary Slip</h5>
                       </div>
                       <div >
                          <h6>Employee Name: <span id="employee_name"></span></h6>
                          <h6>Designation:  <span id="designation"></span></h6>
                          <h6>Date:</h6>
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
                              <td><span id="basic"></span></td>
                              <td>Provident Fund</td>
                              <td><span id="providentFund_t">0</span></td>
                          </tr>
                          <tr>
                              <td>Incentive Pay </td>
                              <td><span id="incentive_t">0</span></td>
                              <td>Professional Tax</td>
                              <td><span id="professional_tax_t">0</span></td>
                          </tr>
                          <tr>
                              <td>House Rent</td>
                              <td><span id="houseRent_t">0</span></td>
                              <td>Loan</td>
                              <td><span id="loan_t">0</span></td>
                          </tr>
                          <tr>
                              <td>Meal Allowance</td>
                              <td><span id="meal_allowance_t">2500</span></td>
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
                                <td><b><span id="total_earnings"></span></b></td>
                                <td></td>
                                <td></td>
                            </tr>
                          <tr>
                            <td></td>
                            <td></td>
                              <td><b>Net Pay</b></td>
                              <td><b><span id="net_pay"></b></td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
             </div>
            </div>
        </div>
    </div>



@endsection

@section('js')

<script>
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

var users = <?=json_encode($users)?>;
const user = users.find(
     element => element.id==e
    );

    document.getElementById("user_id").value=user.id;
    document.getElementById("employee_name").innerHTML=user.name
    document.getElementById("designation").innerHTML=user.designation;
    var basicSalary = document.getElementById("basic").value=user.salary;
    document.getElementById("basic").innerHTML=basicSalary;
    document.getElementById("total_earnings").innerHTML=parseInt(basicSalary) + 2500 ;
    document.getElementById("net_pay").innerHTML=parseInt(basicSalary) + 2500 ;

}



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
