 var DatepickerThai = function () {
	var d = new Date();
	var toDay = d.getDate() + '-'
        + (d.getMonth() + 1) + '-'
        + (d.getFullYear() + 543);
var regional ={
        changeMonth: true,
        changeYear: true,
        //defaultDate: GetFxupdateDate(FxRateDateAndUpdate.d[0].Day),
        //showOn: "button",
        //buttonImage: 'images/calendar.gif',
        //buttonImageOnly: true,
        //buttonText: 'เลือก',
        isBuddhist: true,
        yearOffSet: 543,
        dateFormat: 'dd-mm-yy',
        dayNames: ['อาทิตย์', 'จันทร์', 'อังคาร', 'พุธ', 'พฤหัสบดี', 'ศุกร์', 'เสาร์'],
        dayNamesMin: ['อา', 'จ', 'อ', 'พ', 'พฤ', 'ศ', 'ส'],
        monthNames: ['มกราคม', 'กุมภาพันธ์', 'มีนาคม', 'เมษายน', 'พฤษภาคม', 'มิถุนายน', 'กรกฎาคม', 'สิงหาคม', 'กันยายน', 'ตุลาคม', 'พฤศจิกายน', 'ธันวาคม'],
        monthNamesShort: ['ม.ค.', 'ก.พ.', 'มี.ค.', 'เม.ย.', 'พ.ค.', 'มิ.ย.', 'ก.ค.', 'ส.ค.', 'ก.ย.', 'ต.ค.', 'พ.ย.', 'ธ.ค.'],
        constrainInput: true,
        prevText: 'ก่อนหน้า',
        nextText: 'ถัดไป',
        yearRange: '-45:+1',
        defaultDate: toDay
              
    };
    $.datepicker.setDefaults(regional);


  this.GetDatepicker = function(container) {
      this.container = container;
    $( this.container ).datepicker( regional ); // Set ภาษาที่เรานิยามไว้ด้านบน
    $( this.container ).datepicker("setDate", new Date()); //Set ค่าวันปัจจุบัน
  }


  /*  var Holidays;
 
    //On Selected Date
    //Have Check Date
    function CheckDate(date) {
        var day = date.getDate();
        var selectable = true;//ระบุว่าสามารถเลือกวันที่ได้หรือไม่ True = ได้ False = ไม่ได้
        var CssClass = '';
        
        if (Holidays != null) {

            for (var i = 0; i < Holidays.length; i++) {
                var value = Holidays[i];
                if (value == day) {

                    selectable = false;
                    CssClass = 'specialDate';
                    break;
                }
            }
        }
        return [selectable, CssClass, ''];
    }


    //=====================================================================================================
    //On Selected Date
    function SelectedDate(dateText, inst) {
        //inst.selectedMonth = Index of mounth
        //(inst.selectedMonth+1)  = Current Mounth
        var DateText = inst.selectedDay + '/' + (inst.selectedMonth + 1) + '/' + inst.selectedYear;
        //CallGetUpdateInMonth(ReFxupdateDate(dateText));
        //CallGetUpdateInMonth(DateText);
        return [dateText, inst]
    }
    //=====================================================================================================
    //Call Date in month on click image
    function OnBeforShow(input, inst) {
        var month = inst.currentMonth + 1;
        var year = inst.currentYear;
        //currentDay: 10
        //currentMonth: 6
        //currentYear: 2012
        GetDaysShows(month, year); 
       
    }
    //=====================================================================================================
    //On Selected Date
    //On Change Drop Down
    function ChangMonthAndYear(year, month, inst) {

        GetDaysShows(month, year);
    }

    //=====================================
    function GetDaysShows(month, year) {
        //CallGetDayInMonth(month, year); <<เป็น Function ที่ผมใช้เรียก ajax เพื่อหาวันใน DataBase  แต่นี้เป็นเพียงตัวอย่างจึงใช้ Array ด้านล่างแทนการ Return Json
        //อาจใช้ Ajax Call Data โดยเลือกจากเดือนและปี แล้วจะได้วันที่ต้องการ Set ค่าวันไว้คล้ายด้านล่าง
        Holidays = [1,4,6,11]; // Sample Data
    }*/
    //=====================================
 }