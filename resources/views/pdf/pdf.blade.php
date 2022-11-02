<!DOCTYPE html>
<html>
<head>
    <title>PDF</title>
</head>
<body>

    {{-- <h1>{{ $title }}</h1>
    <p>{{ $date }}</p> --}}

    <table style="width:100%">
        <tr>
            <td style="padding-left: 100px" ></td>
            <td><h3>CODART TECHNOLOGIES</h3></td>
            <td></td>
        </tr>
        <tr>
            <td style="padding-left: 100px" ></td>
            <td>18H DHA Phase1, 1st Floor Lahore</td>
            <td></td>
        </tr>
        <tr>
            <td style="padding-left: 100px;" ></td>
            <td><h5>Salary Slip</h5></td>
            <td></td>
        </tr>



    </table>
         <h6>Employee Name: <span id="employee_name">AbdulRehman</span></h6>
         <h6>Designation:  <span id="designation"></span>ASE</h6>
         <h6>Date:{{\Carbon\Carbon::now()}}</h6>
           <table>
               <tr>
                  <th scope="col"><b>Earnings</b></th>
                  <th scope="col"><b>Amount</b></th>
                  <th scope="col"><b>Deduction</b></th>
                  <th scope="col"><b>Amount</b></th>
                </tr>
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

</body>

</html>
