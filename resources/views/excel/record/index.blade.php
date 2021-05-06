<table>
	<thead>
		<tr>
			<td style='font-size:6.0pt;'>DIVISION FORM NO. 1A</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td style='font-size:6.0pt;'>DEPED DIVISION OF NAGA CITY</td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		<tr>
			<td colspan="11" style="text-align: center;font-size:14.0pt;height:18.75pt;">TEACHERS' LEAVE CARD</td>
		</tr>
		 <tr>
	      <td style="text-align: left;">Name:</td>
	      <td colspan="2">{{ $employee->name }}</td>
	      <td style="text-align: left;">Sex:</td>
	      <td colspan="3">{{ $employee->sex }}</td>
	      <td style="text-align: left;">Emp.No:</td>
	      <td colspan="3" style="text-align: left;">{{ $employee->employeeNumber }}</td>
	    </tr>
	    <tr>
	      <td style="text-align: left;">Position:</td>
	      <td colspan="2">{{ $employee->position }}</td>
	      <td style="text-align: left;">DOB:</td>
	      <td colspan="3" style="text-align: left;">{{ $employee->dob }}</td>
	      <td style="text-align: left;">Station:</td>
	      <td colspan="3" style="text-align: left;">{{ $employee->station }}</td>
	    </tr>
	    <tr style="border-bottom: 1px solid lightgray">
	      <td style="text-align: left;">Date Employed:</td>
	      <td colspan="2" style="text-align: left;">{{ $employee->dateEmployed }}</td>
	      <td style="text-align: left;">POB:</td>
	      <td colspan="3" style="text-align: left;">{{ $employee->pob }}</td>
	      <td style="text-align: left;">Civil.Status:</td>
	      <td colspan="3">{{ $employee->civilStatus }}</td>
	    </tr>
		<tr>
			<td style="text-align: center; border: 0.1px solid black" colspan="4">VACATION SERVICE RENDERED</td>
      		<td style="text-align: center; border: 0.1px solid black" colspan="7">RECORD OF LEAVE</td>
		</tr>
		<tr>
			<td align="center" style="border-left: 0.1px solid black;border-right: 0.1px solid black"></td>
			<td align="center" style="border-right: 0.1px solid black"></td>
			<td align="center" style="border-right: 0.1px solid black">No.of</td>
			<td align="center" style="border-right: 0.1px solid black">DSO</td>
			<td align="center" style="border-right: 0.1px solid black"></td>
			<td align="center" style="border-right: 0.1px solid black">No.of</td>
			<td align="center" style="border-right: 0.1px solid black">Service</td>
			<td align="center" style="border-right: 0.1px solid black">Leave</td>
			<td align="center" style="border-right: 0.1px solid black">Nature</td>
			<td align="center" style="border-right: 0.1px solid black">DSO</td>
			<td align="center" style="border-right: 0.1px solid black"></td>
		</tr>
		<tr>
			<td align="center" style="border-left: 0.1px solid black;border-right: 0.1px solid black">Inclusive Period</td>
			<td align="center" style="border-right: 0.1px solid black">Nature of Activitiy</td>
			<td align="center" style="border-right: 0.1px solid black">Days</td>
			<td align="center" style="border-right: 0.1px solid black">No.</td>
			<td align="center" style="border-right: 0.1px solid black">Inclusive Dates</td>
			<td align="center" style="border-right: 0.1px solid black">Days</td>
			<td align="center" style="border-right: 0.1px solid black">Credit</td>
			<td align="center" style="border-right: 0.1px solid black">W/OUT</td>
			<td align="center" style="border-right: 0.1px solid black">of</td>
			<td align="center" style="border-right: 0.1px solid black">No.</td>
			<td align="center" style="border-right: 0.1px solid black">Remarks</td>
		</tr>
		<tr>
			<td align="center" style="border-left: 0.1px solid black;border-right: 0.1px solid black"></td>
			<td align="center" style="border-right: 0.1px solid black"></td>
			<td align="center" style="border-right: 0.1px solid black">Credited</td>
			<td align="center" style="border-right: 0.1px solid black"></td>
			<td align="center" style="border-right: 0.1px solid black"></td>
			<td align="center" style="border-right: 0.1px solid black">Leave</td>
			<td align="center" style="border-right: 0.1px solid black">Balance</td>
			<td align="center" style="border-right: 0.1px solid black">PAY</td>
			<td align="center" style="border-right: 0.1px solid black">Leave</td>
			<td align="center" style="border-right: 0.1px solid black"></td>
			<td align="center" style="border-right: 0.1px solid black"></td>
		</tr>
	</thead>
	<tbody>
		@foreach($prints as $print)
		<tr>
			<td align="center" style="border:0.1px solid black">{{ $print->inclusivePeriod }}</td>
			<td align="center" style="border:0.1px solid black">{{ $print->natureOfActivity }}</td>
			<td align="center" style="border:0.1px solid black">{{ $print->noOfDaysCredited }}</td>
			<td align="center" style="border:0.1px solid black">{{ $print->dsoNumber1 }}</td>
			<td align="center" style="border:0.1px solid black">{{ $print->inclusiveDates }}</td>
			<td align="center" style="border:0.1px solid black">{{ $print->noOfDaysLeave }}</td>
			<td align="center" style="border:0.1px solid black">{{ $print->serviceCreditBalance }}</td>
			<td align="center" style="border:0.1px solid black">{{ $print->leaveWithoutpay }}</td>
			<td align="center" style="border:0.1px solid black">{{ $print->natureOfLeave }}</td>
			<td align="center" style="border:0.1px solid black">{{ $print->print }}</td>
			<td align="center" style="border:0.1px solid black">{{ $print->remarks }}</td>
		</tr>
		@endforeach
	</tbody>
</table>