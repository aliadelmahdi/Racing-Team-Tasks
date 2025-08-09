<?php
// إعدادات الاتصال بقاعدة البيانات
$servername = "localhost";
$username = "u603782003_database";
$password = "n5j/#d>M";
$database = "u603782003_database";

// إنشاء الاتصال
$conn = new mysqli($servername, $username, $password, $database);

// التحقق من الاتصال
if ($conn->connect_error) {
    die("فشل الاتصال بقاعدة البيانات: " . $conn->connect_error);
}

// استعلام لجلب آخر سطر من الجدول
$sql = "SELECT id, date, time, left_inverter_max_temp, right_inverter_max_temp, ambient_temperature, 
        car_speed_gauge, longitude, latitude, number_of_labs, max_inverter_temp, yaw_rate, barometer_reading, 
        car_heading_angle, car_heading_direction, left_wheel_speed, right_wheel_speed, 
        left_mosfet_temp_1, left_mosfet_temp_2, left_mosfet_temp_3, left_motor_temp, 
        right_mosfet_temp_1, right_mosfet_temp_2, right_mosfet_temp_3, right_motor_temp, 
        total_voltage, total_current, power_consumed, energy_consumed, soc 
        FROM board ORDER BY id DESC LIMIT 1";

$result = $conn->query($sql);

// التحقق من وجود نتائج
if ($result->num_rows > 0) {
    // استخراج البيانات
    $row = $result->fetch_assoc();
    // تحويل البيانات إلى صيغة JSON
    echo json_encode($row);
} else {
    echo json_encode(["message" => "لا توجد بيانات في الجدول."]);
}

// إغلاق الاتصال
$conn->close();
?>
