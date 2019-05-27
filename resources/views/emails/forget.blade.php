<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html lang="ar">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title></title>

    <style type="text/css">
        th, td {
            border-bottom: 1px solid #ddd;
        }
        .mobile{margin-top: 2px;}

    </style>
</head>
<body style="margin:0; padding:0; background-color:#F2F2F2;direction: rtl">
<center>
    <table width="800" cellpadding="0" cellspacing="0" border="0" class="wrapper" bgcolor="#d6d6d6">
        <tr>
            <td align="center" valign="top">

                <table width="800" cellpadding="0" cellspacing="0" border="0" class="container" bgcolor="#d6d6d6" >
                    <tr>
                        <td width="250" class="mobile" align="right" valign="Middle">

                        </td>

                        <td width="300" class="mobile" align="center" valign="middle" style="font-weight: bold;    font-size: 25px;">
                            رابط تحديث كلمة السر          </td>
                        <td width="250" class="mobile" align="left" style="padding-left: 20px;" valign="middle">
                            <img src="{{asset('images/slsAsset6.png')}}" width="" height="" style="margin:0; padding:0; border:none; display:block;" border="0" alt="" />

                        </td>
                    </tr>



                </table>

            </td>
        </tr>
    </table>

    <div >
        تم ارسال هذا البريد بناءا على طلبك لتحديث كلمة السر. يرجى استخدام الرابط التالى لاعادة تعيين كلمة السر :

    </div><br>


        <span>
            {{$user->verify}}
        </span>




</center>
</body>
</html>
