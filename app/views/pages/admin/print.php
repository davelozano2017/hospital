<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print record for patient</title>
</head>
<body onload="print()">
    
<style type="text/css">
  .tg  {border-collapse:collapse;border-spacing:0;border-color:#ccc;}
  .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-widtd:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#fff;}
  .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-widtd:1px;overflow:hidden;word-break:normal;border-color:#ccc;color:#333;background-color:#f0f0f0;}
  .tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
  .tg .tg-us36{border-color:inherit;vertical-align:top}
  .tg .tg-dvpl{border-color:inherit;text-align:right;vertical-align:top}
  .tg .tg-yw4l{vertical-align:top}
  </style>
  <table class="tg" style="margin:auto">
    <tr>
      <td class="tg-dvpl" colspan="4" rowspan="2"><img src="http://localhost/hospital/assets/images/logo.png" style="width:70px;height:70px;float:left">OSPITAL NG TAGAYTAY <br>Bacolod St. Kaybagal Soutd <br>Tagaytay City</td>
      <td class="tg-c3ow">     HOSPITAL CODE    </td>
      <td class="tg-us36"><strong><?=$data['prints']->hospital_code;?></strong></td>
    </tr>
    <tr>
      <td class="tg-c3ow">MEDICAL RECORD NO.</td>
      <td class="tg-us36"><strong><?=$data['prints']->medical_record_number;?></strong></td>
    </tr>
    <tr>
      <td class="tg-c3ow" colspan="6">ADMISSION AND DISCHARGED RECORD</td>
    </tr>
    <tr>
      <td class="tg-us36" colspan="4">PATIENT NAME <br> <strong><?=$data['prints']->surname .', '.$data['prints']->firstname.' '.$data['prints']->middlename;?></strong></td>
      <td class="tg-us36" colspan="2">WARD / SERVICE <br> <strong><?= $data['prints']->room_type.' - '.$data['prints']->floor.' - '.$data['prints']->room_number;?></strong></td>
    </tr>
    <tr>
      <td class="tg-us36" colspan="4">PERMANENT ADDRESS <br><strong><?=$data['prints']->address;?></strong></td>
      <td class="tg-us36">SEX <br> <strong><?=$data['prints']->gender;?></strong></td>
      <td class="tg-us36">CIVIL STATUS <br> <strong><?=$data['prints']->civil_status;?></strong></td>
    </tr>
    <tr>
      <td class="tg-us36">BIRTHDATE <br> <strong><?=date(DATE_FORMAT,strtotime($data['prints']->birthday));?></strong></td>
      <td class="tg-us36">AGE    <br> <strong><?=$data['prints']->age;?></strong>  </td>
      <td class="tg-us36">BIRTHPLACE   <br> <strong><?=$data['prints']->birthplace;?></strong>  </td>
      <td class="tg-us36">NATIONALITY <br><strong><?=$data['prints']->nationality;?></strong></td>
      <td class="tg-us36">RELIGION <br><strong><?=$data['prints']->religion;?></strong></td>
      <td class="tg-us36">OCCUPATION   <br> <strong><?=$data['prints']->occupation;?></strong></td>
    </tr>
    <tr>
      <td class="tg-us36" colspan="3">EMPLOYER <br><strong><?=$data['prints']->name1;?></strong></td>
      <td class="tg-us36" colspan="2">ADDRESS<br><strong><?=$data['prints']->address1;?></strong></td>
      <td class="tg-us36">TEL NO.<br><strong><?=$data['prints']->contact1;?></strong></td>
    </tr>
    <tr>
      <td class="tg-us36" colspan="3">FATHER'S NAME <br><strong><?=$data['prints']->name2;?></strong></td>
      <td class="tg-us36" colspan="2">ADDRESS <br><strong><?=$data['prints']->address2;?></strong></td>
      <td class="tg-us36">TEL NO. <br><strong><?=$data['prints']->contact2;?></strong></td>
    </tr>
    <tr>
      <td class="tg-us36" colspan="3">MOTHER'S NAME<br><strong><?=$data['prints']->name3;?></strong></td>
      <td class="tg-us36" colspan="2">ADDRESS<br><strong><?=$data['prints']->address3;?></strong></td>
      <td class="tg-us36">TEL NO<br><strong><?=$data['prints']->contact3;?></strong></td>
    </tr>
    <tr>
      <td class="tg-us36" colspan="2">ADMISSION <br><strong><?=date(DATE_FORMAT,strtotime($data['prints']->admission_date)).' - '.$data['prints']->admission_time?></strong> </td>
      <td class="tg-us36">DISCHARGE <br><strong><?= $data['prints']->discharged_date == '' ? '' : date(DATE_FORMAT,strtotime($data['prints']->discharged_date)).' - '.$data['prints']->discharged_time?></strong></td>
      <td class="tg-us36">TOTAL NO OF DAYS <br> <strong><?=$data['prints']->days?></strong></td>
      <td class="tg-us36">ADMITTING PERSONNEL <br> <strong><?=$data['prints']->admitting_personnel?></strong></td>
      <td class="tg-us36">ATTENDING PHYSICIAN<br> <strong><?=$data['prints']->name?></strong>,MD</td>
    </tr>
    <tr>
      <td class="tg-us36" colspan="3">TYPE OF ADMISSION <br> <strong><?=$data['prints']->admission_type?></strong></td>
      <td class="tg-us36" colspan="3">REFERRED BY:<br>(PHYSICIANS / AGENCY): <br> <strong><?=$data['prints']->referred_by?></strong>,MD</td>
    </tr>
    <tr>
      <td class="tg-yw4l" colspan="3">ALERT <br> <strong><?=$data['prints']->alert?></strong></td>
      <td class="tg-yw4l" colspan="3">HEALTH INSURANCE / BENEFITS <br> <strong><?=$data['prints']->health_insurance?></strong></td>
    </tr>
    <tr>
      <td class="tg-yw4l" colspan="3">ALLERGIC TO <br> <strong><?=$data['prints']->allergic?></strong></td>
      <td class="tg-yw4l" colspan="3">PHILHEALTH <br> <strong><?=$data['prints']->philhealth?></strong></td>
    </tr>
    <tr>
      <td class="tg-yw4l" colspan="2">DATA FURNISHED BY <br> <strong><?=$data['prints']->data_furnished?></strong></td>
      <td class="tg-yw4l" colspan="3">ADDRESS AND CONTACT NO. OF INFORMANT <br> <strong><?=$data['prints']->informant?></strong></td>
      <td class="tg-yw4l">RELATION TO PATIENT <br> <strong><?=$data['prints']->patient_relation?></strong></td>
    </tr>
    <tr>
      <td class="tg-yw4l" colspan="6">ADMISSION DIAGNOSIS<br> <strong><?=$data['prints']->admission_diagnosis?></strong></td>
    </tr>
    <tr>
      <td class="tg-yw4l" colspan="5">FINAL DIAGNOSIS<br> <strong><?=$data['prints']->final_diagnosis?></strong></td>
      <td class="tg-yw4l">ICD CODE NO.<br> <strong><?=$data['prints']->icd?></strong></td>
    </tr>
    <tr>
      <td class="tg-yw4l" colspan="5">PRINCIPAL OPERATION / PROCEDURE<br>OtdER OPERATION(S) PROCESURE(S)<br>ACCIDENT / INJURIES / POISONING ( E CODE )<br>PLACE OF OCCURANCE <br> <strong><?=$data['prints']->principal_operation?></strong></td>
      <td class="tg-yw4l"></td>
    </tr>
    <tr>
      <td class="tg-yw4l" colspan="3">DISPOSITION<br> <strong><?=$data['prints']->disposition?></strong></td>
      <td class="tg-yw4l" colspan="2">OUTCOME<br> <strong><?=$data['prints']->outcome?></strong></td>
      <td class="tg-yw4l"></td>
    </tr>
  </table>
</body>
</html>