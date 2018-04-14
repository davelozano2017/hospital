<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-l711{border-color:inherit}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-uys7{border-color:inherit;text-align:center}
.tg .tg-us36{border-color:inherit;vertical-align:top}
</style>
</head>
<body onload="print()">
    <div style="margin:auto;width:900px">
    
        <table class="tg">
        <tr>
            <th class="tg-l711" colspan="3"><img style="width:120px;height:120px" src="https://www.foreclosurephilippines.com/wp-content/uploads/2010/11/tagaytay-city-official-seal1.jpg"></th>
            <th class="tg-uys7" colspan="5">#################   <br>OSPITAL NG TAGAYTAY<br>#################################<br>#############<br>PHILHEALTH ACCREDITED</th>
            <th class="tg-l711" colspan="2"><img style="width:120px;height:120px" src="http://localhost/hospital/assets/images/logo.png"></th>
        </tr>
        <tr>
            <td class="tg-l711" colspan="10">&nbsp; &nbsp; &nbsp; &nbsp; ################################################################################################&nbsp; &nbsp; &nbsp; &nbsp; </td>
        </tr>
        <tr>
            <td class="tg-c3ow" colspan="4">TYPE</td>
            <td class="tg-c3ow" colspan="4">MEDICAL RECORD <br>OUT-PATIENT-DEPARTMENT</td>
            <td class="tg-c3ow" colspan="2">OPD CASE NO. <br><?=$data['prints']->opd_case_number?></td>
        </tr>
        <tr>
            <td class="tg-us36" colspan="4">DATE AND TIME  <br><?=date(DATE_FORMAT,strtotime($data['prints']->date)).' - '.date('g i A',strtotime($data['prints']->time))?> </td>
            <td class="tg-c3ow" colspan="3">LASTNAME <br><?=$data['prints']->surname?></td>
            <td class="tg-c3ow">FIRSTNAME <br><?=$data['prints']->firstname?></td>
            <td class="tg-c3ow" colspan="2">MIDDLENAME <br><?=$data['prints']->middlename?></td>
        </tr>
        <tr>
            <td class="tg-us36" colspan="4">BIRTHDATE<br><?=$data['prints']->birthday?></td>
            <td class="tg-c3ow">AGE<br><?=$data['prints']->age?></td>
            <td class="tg-c3ow">SEX<br><?=$data['prints']->gender?></td>
            <td class="tg-us36" colspan="4">ADDRESS<br><?=$data['prints']->address?></td>
        </tr>
        <tr>
            <td class="tg-us36" colspan="5">CHIEF COMPLAINTS <br><?=$data['prints']->chief_complaints?></td>
            <td class="tg-us36">BP<br><?=$data['prints']->hp?></td>
            <td class="tg-us36">PULSE RATE<br><?=$data['prints']->pulse_rate?></td>
            <td class="tg-us36">RESPIRATORY RATE<br><?=$data['prints']->respiratory_rate?></td>
            <td class="tg-us36">TEMPERATURE<br><?=$data['prints']->temperature?></td>
            <td class="tg-us36">WEIGHT<br><?=$data['prints']->weight?></td>
        </tr>
        <tr>
            <td class="tg-us36" colspan="10"><?=$data['prints']->impression?><br>IMPRESSIONS / DIAGNOSIS</td>
        </tr>
        <tr>
            <td class="tg-us36" colspan="10"><?=$data['prints']->treatment?><br>TREATMENT / MEDICINE</td>
        </tr>
        </table>
    </div>
</body>
</html>