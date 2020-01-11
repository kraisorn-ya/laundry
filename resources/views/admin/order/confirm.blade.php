@extends('admin.layouts.main_dashboard')
@section('title', 'ยืนยันการใช้บริการ')
@section('content')
    <table class="table table-bordered">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">ชื่อเสื้อผ้า</th>
            <th scope="col">ราคา</th>
            <th scope="col">จำนวน</th>
            <th scope="col">ราคารวม</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
        </tr>
        </tbody>
    </table>
@endsection





{{--<html>--}}
{{--<head>--}}
{{--    <title>ThaiCreate.Com Tutorial</title>--}}
{{--</head>--}}
{{--<body>--}}
{{--<script language="javascript">--}}
{{--    function fncCal()--}}
{{--    {--}}
{{--        var tot = 0;--}}
{{--        var sum = 0;--}}
{{--        for(i=1;i<=document.form1.hdnLine.value;i++)--}}
{{--        {--}}
{{--            tot = parseInt(eval("document.form1.txtVol1_"+i+".value")) + parseInt(eval("document.form1.txtVol2_"+i+".value"))--}}
{{--            eval("document.form1.txtVol3_"+i+".value="+tot);--}}
{{--            sum = tot + sum;--}}
{{--            document.form1.txtSum.value=sum;--}}
{{--        }--}}
{{--    }--}}
{{--</script>--}}
{{--<form action="page.cgi" method="post" name="form1">--}}
{{--    Input 1 <input name="txtVol[]" id="txtVol1_1" type="text"> <input name="txtVol[]" id="txtVol2_1" type="text"> =  <input name="txtVol[]" id="txtVol3_1" type="text"><br>--}}
{{--    Input 2 <input name="txtVol[]" id="txtVol1_2" type="text"> <input name="txtVol[]" id="txtVol2_2" type="text"> =  <input name="txtVol[]" id="txtVol3_2" type="text"><br>--}}
{{--    Input 3 <input name="txtVol[]" id="txtVol1_3" type="text"> <input name="txtVol[]" id="txtVol2_3" type="text"> =  <input name="txtVol[]" id="txtVol3_3" type="text"><br>--}}
{{--    Input 4 <input name="txtVol[]" id="txtVol1_4" type="text"> <input name="txtVol[]" id="txtVol2_4" type="text"> =  <input name="txtVol[]" id="txtVol3_4" type="text"><br>--}}
{{--    Input 5 <input name="txtVol[]" id="txtVol1_5" type="text"> <input name="txtVol[]" id="txtVol2_5" type="text"> =  <input name="txtVol[]" id="txtVol3_5" type="text"><br>--}}
{{--    <input type="hidden" name="hdnLine" value="5">--}}

{{--    Summary : <input name="txtSum" id="txtSim" type="text"><br>--}}

{{--    <input name="btnCal" type="button" value="Cal" OnClick="JavaScript:fncCal();">--}}
{{--</form>--}}
{{--</body>--}}
{{--</html>--}}