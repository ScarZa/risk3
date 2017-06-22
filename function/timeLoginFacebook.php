<?php

/* =Time&Date Config
  -------------------------------------------------------------- */
$SuffixTime = array(
    "th" => array(
        "time" => array(
            "Seconds" => " วินาทีที่แล้ว",
            "Minutes" => " นาทีที่แล้ว",
            "Hours" => " ชั่วโมงที่แล้ว"
        ),
        "day" => array(
            "Yesterday" => "เมื่อวาน เวลา ",
            "Monday" => "วันจันทร์ เวลา ",
            "Tuesday" => "วันอังคาร เวลา ",
            "Wednesday" => "วันพุธ เวลา ",
            "Thursday" => "วันพฤหัสบดี เวลา ",
            "Friday" => "วันศุกร์ เวลา ",
            "Saturday" => " วันวันเสาร์ เวลา ",
            "Sunday" => "วันอาทิตย์ เวลา ",
        )
    ),
    "en" => array(
        "time" => array(
            "Seconds" => " seconds ago",
            "Minutes" => " minutes ago",
            "Hours" => " hours ago"
        ),
        "day" => array(
            "Yesterday" => "Yesterday at ",
            "Monday" => "Monday at ",
            "Tuesday" => "Tuesday at ",
            "Wednesday" => "Wednesday at ",
            "Thursday" => "Thursday at ",
            "Friday" => "Friday at ",
            "Saturday" => "Saturday at ",
            "Sunday" => "Sunday at ",
        )
    )
);

$DateThai = array(
    // Day
    "l" => array(// Full day
        "Monday" => "วันจันทร์",
        "Tuesday" => "วันอังคาร",
        "Wednesday" => "วันพุธ",
        "Thursday" => "วันพฤหัสบดี",
        "Friday" => "วันศุกร์",
        "Saturday" => "วันวันเสาร์",
        "Sunday" => "วันอาทิตย์",
    ),
    "D" => array(// Abbreviated day
        "Monday" => "จันทร์",
        "Tuesday" => "อังคาร",
        "Wednesday" => "พุธ",
        "Thursday" => "พฤหัส",
        "Friday" => "ศุกร์",
        "Saturday" => "วันเสาร์",
        "Sunday" => "อาทิตย์",
    ),
    // Month
    "F" => array(// Full month
        "January" => "มกราคม",
        "February" => "กุมภาพันธ์",
        "March" => "มีนาคม",
        "April" => "เมษายน",
        "May" => "พฤษภาคม",
        "June" => "มิถุนายน",
        "July" => "กรกฎาคม",
        "August" => "สิงหาคม",
        "September" => "กันยายน",
        "October" => "ตุลาคม",
        "November" => "พฤศจิกายน",
        "December" => "ธันวาคม"
    ),
    "M" => array(// Abbreviated month
        "January" => "ม.ค.",
        "February" => "ก.พ.",
        "March" => "มี.ค.",
        "April" => "เม.ย.",
        "May" => "พ.ค.",
        "June" => "มิ.ย.",
        "July" => "ก.ค.",
        "August" => "ส.ค.",
        "September" => "ก.ย.",
        "October" => "ต.ค.",
        "November" => "พ.ย.",
        "December" => "ธ.ค."
    )
);
/* =Time&Date Config
  -------------------------------------------------------------- */

function generate_date_today($Format, $Timestamp, $Language = "en", $TimeText = true) {
    global $SuffixTime, $DateThai;
    //return date("i:H d-m-Y", $Timestamp) ." | ". date("i:H d-m-Y", time());
    if (date("Ymd", $Timestamp) >= date("Ymd", (time() - 345600)) && $TimeText) {    // Less than 3 days.
        $TimeStampAgo = (time() - $Timestamp);

        if (($TimeStampAgo < 86400)) {   // Less than 1 day.

            $TimeDay = "time";    // Use array time

            if ($TimeStampAgo < 60) {    // Less than 1 minute.
                $Return = (time() - $Timestamp);
                $Values = "Seconds";
            } else if ($TimeStampAgo < 3600) {   // Less than 1 hour.
                $Return = floor((time() - $Timestamp) / 60);
                $Values = "Minutes";
            } else {   // Less than 1 day.
                $Return = floor((time() - $Timestamp) / 3600);
                $Values = "Hours";
            }
        } else if ($TimeStampAgo < 172800) {   // Less than 2 day.
            $Return = date("H:i", $Timestamp);
            $TimeDay = "day";
            $Values = "Yesterday";
        } else {  // More than 2 hours..
            $Return = date("H:i", $Timestamp);
            $TimeDay = "day";
            $Values = date("l", $Timestamp);
        }

        if ($TimeDay == "time")
            $Return .= $SuffixTime[$Language][$TimeDay][$Values];
        else if ($TimeDay == "day")
            $Return = $SuffixTime[$Language][$TimeDay][$Values] . $Return;

        return $Return;
    }
    else {
        if ($Language == "en") {
            return date($Format, $Timestamp);
        } else if ($Language == "th") {
            $Format = str_replace("l", "|1|", $Format);
            $Format = str_replace("D", "|2|", $Format);
            $Format = str_replace("F", "|3|", $Format);
            $Format = str_replace("M", "|4|", $Format);
            $Format = str_replace("y", "|x|", $Format);
            $Format = str_replace("Y", "|X|", $Format);

            $DateCache = date($Format, $Timestamp);

            $AR1 = array("", "l", "D", "F", "M");
            $AR2 = array("", "l", "l", "F", "F");

            for ($i = 1; $i <= 4; $i++) {
                if (strstr($DateCache, "|" . $i . "|")) {
                    //$Return .= $i;
                    $StrCache ='';
                    $split = explode("|" . $i . "|", $DateCache);
                    for ($j = 0; $j < count($split) - 1; $j++) {
                        $StrCache .= $split[$j];
                        $StrCache .= $DateThai[$AR1[$i]][date($AR2[$i], $Timestamp)];
                    }
                    $StrCache .= $split[count($split) - 1];
                    $DateCache = $StrCache;
                    $StrCache = "";
                    empty($split);
                }
            }

            if (strstr($DateCache, "|x|")) {

                $split = explode("|x|", $DateCache);

                for ($i = 0; $i < count($split) - 1; $i++) {
                    $StrCache .= $split[$i];
                    $StrCache .= substr((date("Y", $Timestamp) + 543), -2);
                }
                $StrCache .= $split[count($split) - 1];
                $DateCache = $StrCache;
                $StrCache = "";
                empty($split);
            }

            if (strstr($DateCache, "|X|")) {

                $split = explode("|X|", $DateCache);

                for ($i = 0; $i < count($split) - 1; $i++) {
                    $StrCache .= $split[$i];
                    $StrCache .= (date("Y", $Timestamp) + 543);
                }
                $StrCache .= $split[count($split) - 1];
                $DateCache = $StrCache;
                $StrCache = "";
                empty($split);
            }

            $Return = $DateCache;

            return $Return;
        }
    }
}

/*
  การใช้งาน
  เรียกใช้ฟังก์ชั่น generate_date_today($Format, $Timestamp, $Language, $TimeText )
  อธิบายความหมาย
  $Format = รูปแบบเวลาที่จะแสดงในแบบเวลาธรรมดา เช่น "d M Y H:i"
  $Timestamp = เวลาที่จะคำนวน ต้องเป็นเวลาแบบ timestamp เช่น 1309006064
  $Language = ภาษาที่จะแสดง แสดงภาษาไทยใส่ "th", แสดงภาษาอังกฤษ "en" (ค่าแรกเริ่มเป็นภาษาอังกฤษ "en")
  $TimeText = ต้องการแสดงเวลาเป็นแบบข้อความหรือแบบปกติทั่วไป หากต้องการแสดงให้ใส่ค่า "true" หากไม่ต้องการให้ใส่ค่า "false" (ค่าเริ่มต้นคือแสดง true)


  ตัวอย่างการแสดงข้อความ
  Code (PHP)
  echo "แสดงผลเป็นข้อความ";
  echo "<br />";
  echo "English : ". generate_date_today("d M Y H:i", (time()-14400), "en", true);
  echo "<br />";
  echo "English : ". generate_date_today("d M Y H:i", (time()-14400));
  echo "<br />";
  echo "ภาษาไทย : ". generate_date_today("d M Y H:i", (time()-14400), "th", true);
  echo "<br />";
  echo "ภาษาไทย : ". generate_date_today("d M Y H:i", (time()-14400), "th");
  echo "<br />";
  echo "<br />";
  echo "<br />";
  echo "แสดงผลเป็นเวลาธรรมดา";
  echo "<br />";
  echo "English : ". generate_date_today("d M Y H:i", (time()-14400), "en", false);
  echo "<br />";
  echo "ภาษาไทย : ". generate_date_today("d M Y H:i", (time()-14400), "th", false);

 */

//generate_date_today("d M Y H:i", (time()-14400), "th");
?>