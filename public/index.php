 
<style>
    #file-upload{
        display: none;
    }
    
    .file-uploadx div{ 
        height: 30px;
        width: 160px;
        margin-right: 10px;
        margin-bottom: 10px;
        border: 1px solid #000;
        cursor: pointer;
        background-color: #efefef;
        text-align: center;
        padding: 10px 10px 0px; 
        font-size: 12px;
    }
</style>

<form enctype="multipart/form-data" method="post" id="frm-upload" name="frm-upload"> 
    <label for="file-upload" class="file-uploadx">
        <div>
            <input id="file-upload" type="file"  name="pdf_file" onchange="getval()">   
           PDFx
        </div> 
    </label>
</form>


<input type="text" name="adv_no" id="adv_no" placeholder="เลขเรื่อง" > <br>
<input type="text" name="drv_name" id="drv_name" placeholder="ผู้ขับขี่"><br>
<input type="text" name="drv_tel" id="drv_tel" placeholder="เบอร์โทรคนขับ"> <br>

<input type="text" name="car_license" id="car_license" placeholder="ทะเบียน"> 

<br><br>


<select class="inputbox" name="car_brand_id" id="car_brand_id" style="" onchange="event_carBrand();">
    <option value="">กรุณาเลือก</option>
    <option value="1">Toyota</option>
    <option value="8">Honda</option>
    <option value="6">Isuzu</option>
    <option value="4">Mitsubishi</option>
    <option value="5">Nissan</option>
    <option value="7">Mazda</option>
    <option value="10">Suzuki</option>
    <option value="11">Subaru</option>
    <option value="12">Hyundai</option>
    <option value="9">Ssangyong</option>
    <option value="13">Daewoo</option>
    <option value="33">Kia</option>
    <option value="14">Benz</option>
    <option value="15">Bmw</option>
    <option value="16">Volvo</option>
    <option value="17">Ford</option>
    <option value="18">Alfa romeo</option>
    <option value="19">Audi</option>
    <option value="20">Austin</option>
    <option value="21">Bently</option>
    <option value="22">Buic</option>
    <option value="23">Cadillac</option>
    <option value="24">Chevrolet</option>
    <option value="25">Chrysler</option>
    <option value="26">Citroen</option>
    <option value="27">Daihatsu</option>
    <option value="28">Ferrari</option>
    <option value="29">Fait</option>
    <option value="30">Holden</option>
    <option value="54">Hino</option>
    <option value="31">Jaguar</option>
    <option value="32">Jeep</option>
    <option value="34">Lamboghini</option>
    <option value="35">Land rover</option>
    <option value="36">Lexus</option>
    <option value="38">Lotus</option>
    <option value="37">Lincoln</option>
    <option value="39">Maserati</option>
    <option value="40">MG</option>
    <option value="41">Ople</option>
    <option value="42">Peugeot</option>
    <option value="43">Pontiac</option>
    <option value="44">Porsche</option>
    <option value="46">Renault</option>
    <option value="45">Proton</option>
    <option value="47">Rolls-Royce</option>
    <option value="48">Rover</option>
    <option value="49">Saab</option>
    <option value="50">Seat</option>
    <option value="64">Scania</option>
    <option value="51">Skoda</option>
    <option value="52">Smart</option>
    <option value="65">Tata</option>
    <option value="53">Volkswagen</option>
    <option value="55">Vespa</option>
    <option value="56">Kawazaki</option>
    <option value="63">Yamaha</option>
    <option value="57">สามล้อ</option>
    <option value="58">สิบล้อ</option>
    <option value="59">ทรัพย์สิน</option>
    <option value="60">คนเดินเท้า</option>
    <option value="62">อื่นๆ</option>
    <option value="66">Fuso</option>
    <option value="68">Ud</option>
    <option value="69">MINI</option>
</select>

<br> <br>

<select class="inputbox" name="car_province_id" id="car_province_id">
    <option value="16">กรุณาเลือก</option>
    <option value="5">กรุงเทพฯ</option>
    <option value="17">กระบี่</option>
    <option value="18">กาญจนบุรี</option>
    <option value="19">กาฬสินธุ์</option>
    <option value="20">กำแพงเพชร</option>
    <option value="21">ขอนแก่น</option>
    <option value="22">จันทบุรี</option>
    <option value="10">ฉะเชิงเทรา</option>
    <option value="15">ชลบุรี</option>
    <option value="23">ชัยนาท</option>
    <option value="24">ชัยภูมิ</option>
    <option value="25">ชุมพร</option>
    <option value="26">เชียงราย</option>
    <option value="27">เชียงใหม่</option>
    <option value="28">ตรัง</option>
    <option value="29">ตราด</option>
    <option value="30">ตาก</option>
    <option value="31">นครนายก</option>
    <option value="14">นครปฐม</option>
    <option value="32">นครพนม</option>
    <option value="33">นครราชสีมา</option>
    <option value="34">นครศรีธรรมราช</option>
    <option value="35">นครสววรค์</option>
    <option value="7">นนทบุรี</option>
    <option value="36">นราธิวาส</option>
    <option value="37">น่าน</option>
    <option value="38">บุรีรัมย์</option>
    <option value="8">ปทุมธานี</option>
    <option value="39">ประจวบคีรีขันธุ์</option>
    <option value="40">ปราจีนบุรี</option>
    <option value="41">ปัตตานี</option>
    <option value="13">พระนครศรีอยุธยา</option>
    <option value="42">พะเยา</option>
    <option value="43">พังงา</option>
    <option value="44">พัทลุง</option>
    <option value="45">พิจิตร</option>
    <option value="46">พิษณุโลก</option>
    <option value="47">เพชรบุรี</option>
    <option value="48">เพชรบูรณ์</option>
    <option value="49">แพร่</option>
    <option value="50">ภูเก็ต</option>
    <option value="51">มหาสารคาม</option>
    <option value="52">มุกดาหาร</option>
    <option value="53">แม่ฮ่องสอน</option>
    <option value="54">ยโสธร</option>
    <option value="55">ยะลา</option>
    <option value="56">ร้อยเอ็ด</option>
    <option value="57">ระนอง</option>
    <option value="58">ระยอง</option>
    <option value="59">ราชบุรี</option>
    <option value="60">ลพบุรี</option>
    <option value="61">ลำปาง</option>
    <option value="62">ลำพูน</option>
    <option value="63">เลย</option>
    <option value="64">ศรีสะเกษ</option>
    <option value="65">สกลนคร</option>
    <option value="66">สงขลา</option>
    <option value="67">สตูล</option>
    <option value="9">สมุทรปราการ</option>
    <option value="12">สมุทรสงคราม</option>
    <option value="11">สมุทรสาคร</option>
    <option value="68">สระแก้ว</option>
    <option value="69">สระบุรี</option>
    <option value="70">สิงห์บุรี</option>
    <option value="71">สุโขทัย</option>
    <option value="72">สุพรรณบุรี</option>
    <option value="73">สุราษฎร์ธานี</option>
    <option value="74">สุรินทร์</option>
    <option value="75">หนองคาย</option>
    <option value="76">หนองบัวลำภู</option>
    <option value="77">อ่างทอง</option>
    <option value="78">อำนาจเจริญ</option>
    <option value="79">อุดรธานี</option>
    <option value="80">อุตรดิตถ์</option>
    <option value="81">อุทัยธานี</option>
    <option value="82">อุบลราชธานี</option>
    <option value="83">บึงกาฬ</option>
</select>
 

<style>
    .pop-showx{
        background-color: red;
        position: absolute;
        margin-top: -25px;
        padding: 5px;
        color: #fff;
        font-size: 12px;
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script> 
<script>
    function getval(element){  
        var formData = new FormData($('#frm-upload')[0]); 
       
        $.ajax({
            type: "POST",
            url: 'pdf-upload.php?uploadPDF',
            data: formData,
            contentType: false,
            dataType: 'json',
            processData: false,


            
            beforeSend: function () {},
            success: function (data) {  
                $('#adv_no').val(data.adv_no);      

                console(data.adv_no);
                $('#drv_name').val(data.drv_name);    
                $('#drv_tel').val(data.drv_tel);      
                $('#car_license').val(data.car_license);        
                $('#insure_no').val(data.insure_no);    
                $('#insure_start_date').val(data.insure_start_date);      
                $('#venue').val(data.venue);   
                $('#coachwork_no').val(data.coachwork_no);   
                $('#insure_name').val(data.insure_name);      
                $('#accident_date').val(data.accident_date);   
                $('#notify_name').val(data.notify_name);   

                $('#chk_text_area_comment').prop('checked', true);
                $('#text_area_comment').show();
                $('#text_area_comment').prop('disabled', false);
                $('#text_area_comment').val(data.text_area_comment);   


                
                $('.car_brand_id').text("");
                $("<span class='pop-showx car_brand_id'>"+data.car_brand_id+"</span>").insertBefore("#car_brand_id"); 
                $('#car_brand_id').on('change', function() {
                    if(this.value!=''){$('.car_brand_id').hide();}
                    else{$('.car_brand_id').show(); }
                }); 

                $('.car_province_id').text("");
                $("<span class='pop-showx car_province_id'>"+data.car_province_id+"</span>").insertBefore("#car_province_id"); 
                $('#car_province_id').on('change', function() {
                    if(this.value!=16){$('.car_province_id').hide();}
                    else{$('.car_province_id').show(); }
                }); 
				$('.insure_type_id').text("");
                $("<span class='pop-showx insure_type_id'>"+data.insure_type_id+"</span>").insertBefore("#insure_type_id"); 
                $('#insure_type_id').on('change', function() {
                    if(this.value!=''){$('.insure_type_id').hide();}
                    else{$('.insure_type_id').show(); }
                }); 
	
				$('.acc_type_id').text("");
                $("<span class='pop-showx acc_type_id'>"+data.acc_type_id+"</span>").insertBefore("#acc_type_id"); 
                $('#acc_type_id').on('change', function() {
                    if(this.value!=''){$('.acc_type_id').hide();}
                    else{$('.acc_type_id').show(); }
                }); 
				

                
            },
            error: function (xhr, status, error) { 
                console.log(xhr);
                alert("error");     
            }
 
        });
    }
 


 </script>